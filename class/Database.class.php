<?php

class Database
{
  private static $_instance;
  private $_db; // Instance de PDO

  public static function getInstance()
  {
    if (self::$_instance === null)
      self::$_instance = new Database();

    return self::$_instance;
  }


  public function __construct()
  {
    $PARAM_hote = '127.0.0.1';
    $PARAM_port = '3306';
    $PARAM_nom_bd = 'planning';
    $PARAM_utilisateur = 'root';
    $PARAM_mot_passe = '';

    try
    {
      $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
      $this->db = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe, $pdo_options);
    }
    catch(PDOException $e)
    {
      $this->db = NULL;
    }
  }

  public function exist($pseudo, $password)
  {
    $query = $this->db->prepare("SELECT * FROM users WHERE pseudo = ? AND password = ?");

    if (!$query->execute(array($pseudo, $password)))
      return false;

    $row = $query->fetch();

    if ($query->rowCount() > 0){
      $result['id'] = $row['id'];
      $result['pseudo'] = $row['pseudo'];
      return $result;
    }


    return false;
  }

  public function existGuest($pseudo, $guestpass)
  {
    $query = $this->db->prepare("SELECT * FROM users WHERE pseudo = ? AND guestpass = ?");

    if (!$query->execute(array($pseudo, $guestpass)))
      return false;

    $row = $query->fetch();

    if ($query->rowCount() > 0){
      $result['id'] = $row['id'];
      $result['pseudo'] = $row['pseudo'];
      return $result;
    }


    return false;
  }

  public function createPlanning($name)
  {
    $queryCheck = $this->db->prepare("SELECT * FROM plannings WHERE name = ? AND idUser = ?");
    $queryCheck->execute(array($name, $_SESSION['idUser']));

    if ($queryCheck->rowCount() == 0)
    {
      $query = $this->db->prepare("INSERT INTO plannings VALUES('', CURDATE(), ?, ?, '')");

      if (!$query->execute(array($_SESSION['idUser'], $name)))
	return false;

      return true;
    }
    else
      return 3;
  }

  public function getPlannings()
  {
    $query = $this->db->prepare("SELECT * FROM plannings WHERE idUser = ?");

    if (!$query->execute(array($_SESSION['idUser'])))
      return false;

    while($row = $query->fetch())
      $result[] = $row;

    return $result;
  }

  public function getPlanningByName($name)
  {
    $query = $this->db->prepare("SELECT idUser, id FROM plannings WHERE name = ?");

    if (!$query->execute(array($name)))
      return false;

    $row = $query->fetch();

    if ($row['idUser'] != $_SESSION['idUser'])
      return false;

    return $row['id'];
  }

  public function getMembers()
  {
    $query = $this->db->prepare("SELECT * FROM members WHERE idPlanning = ? ORDER BY sort");

    if (!$query->execute(array($_SESSION['currentPlanningId'])))
      return false;

    if ($query->rowCount() > 0)
      while($row = $query->fetch())
	$result[] = $row;
    else
      $result = [];

    return $result;
  }

  public function getMembersByPlanning()
  {
    $query = $this->db->prepare("SELECT members.name, members.sort FROM plannings, members WHERE members.idPlanning = plannings.id AND plannings.id = ? ORDER BY members.sort");

    if (!$query->execute(array($_SESSION['currentPlanningId'])))
      return false;

    if ($query->rowCount() > 0)
      while($row = $query->fetch())
	$result[] = $row;
    else
      $result = [];

    return $result;
  }

  public function addType($name, $color)
  {
    $this->planningUpdated();

    $queryCheck = $this->db->prepare("SELECT * FROM types WHERE name = ? AND idPlanning = ?");
    $queryCheck->execute(array($name, $_SESSION['currentPlanningId']));

    if ($queryCheck->rowCount() == 0)
    {
      $query = $this->db->prepare("INSERT INTO types VALUES('', ?, ?, ?)");

      if (!$query->execute(array($name, $color, $_SESSION['currentPlanningId'])))
	return false;

      return $this->db->lastInsertId();
    }
    else
      return -1;
  }

  public function getTypes()
  {
    $query = $this->db->prepare("SELECT * FROM types WHERE idPlanning = ? ORDER BY id");

    if (!$query->execute(array($_SESSION['currentPlanningId'])))
      return false;

    if ($query->rowCount() > 0)
      while($row = $query->fetch())
	$result[] = $row;
    else
      $result[0] = "null";

    return $result;
  }

  public function deleteType($id)
  {
    $this->planningUpdated();

    // $query = $this->db->prepare("SELECT id FROM types WHERE name = ? AND idPlanning = ?");
    // $query->execute(array($name, $_SESSION['currentPlanningId']));
    // $id = $query->fetch()['id'];

    $query = $this->db->prepare("DELETE FROM types WHERE id = ? AND idPlanning = ?");
    $query->execute(array($id, $_SESSION['currentPlanningId']));

    $clean = $this->db->prepare("DELETE FROM labels WHERE idType = ?");
    $clean->execute(array($id));

    return $query->rowCount();
  }

  public function addLabelById($comment, $color, $member, $day, $month, $year)
  {
    $this->planningUpdated();

    $queryExist = $this->db->prepare("DELETE FROM labels WHERE idMember = ? AND idDay = ? AND idMonth = ? AND idYear = ?");
    $queryExist->execute(array($member, $day, $month, $year));

    $query = $this->db->prepare("INSERT INTO labels VALUES('', ?, ?, ?, ?, ?, ?, ?)");

    if (!$query->execute(array($comment, $color, $member, $month, $day, $year, $_SESSION['currentPlanningId'])))
      return false;

    return true;
  }

  public function addLabel($comment, $color, $member, $day, $month, $year)
  {
    $queryIdMember = $this->db->prepare("SELECT id FROM members WHERE name = ? AND idPlanning = ?");
    $queryIdMember->execute(array($member, $_SESSION['currentPlanningId']));
    $idMember = $queryIdMember->fetch();

    return ($this->addLabelById($comment, $color, $idMember['id'], $day, $month, $year));
  }

  public function getLabels($month, $year)
  {
    $query = $this->db->prepare("SELECT members.name, idDay, color, description FROM members, labels, types WHERE types.id = labels.idType AND labels.idMember = members.id AND idYear = ? AND idMonth = ? AND members.idPlanning = ?");
    $query->execute(array($year, $month, $_SESSION['currentPlanningId']));

    if ($query->rowCount() > 0)
      while($row = $query->fetch())
      {
	$result[$row['name']][$row['idDay']]['color'] = $row['color'];
	$result[$row['name']][$row['idDay']]['desc'] = $row['description'];
      }
    else
      $result['return'] = "null";

    return $result;
  }

  public function getLabelsByMember($member)
  {
    $query = $this->db->prepare("SELECT * FROM labels, members WHERE members.name = ? AND members.id = labels.idMember AND members.idPlanning = ?");
    $query->execute(array($member, $_SESSION['currentPlanningId']));

    if ($query->rowCount() > 0)
      while ($row = $query->fetch())
	$result[$row['idYear']][$row['idMonth']][$row['idDay']] = $row['idType'];
    else
      $result = [];

    return $result;
  }

  public function getInfoPlanning()
  {
    $query = $this->db->prepare("SELECT name, date, message FROM plannings WHERE id = ?");
    $query->execute(array($_SESSION['currentPlanningId']));

    $result = $query->fetch();

    return $result;
  }

  public function getColorByType($name)
  {
    $query = $this->db->prepare("SELECT color FROM types WHERE name = ? AND idPlanning = ?");

    if (!$query->execute(array($name, $_SESSION['currentPlanningId'])))
      return false;

    $row = $query->fetch();

    return $row['color'];
  }

  public function deleteLabel($member, $year, $month, $day)
  {
    $this->planningUpdated();

    $queryIdMember = $this->db->prepare("SELECT id FROM members WHERE name = ? AND idPlanning = ?");
    $queryIdMember->execute(array($member, $_SESSION['currentPlanningId']));
    $idMember = $queryIdMember->fetch();

    $query = $this->db->prepare("DELETE FROM labels WHERE idMember = ? AND idYear = ? AND idMonth = ? AND idDay = ? AND idPlanning = ?");

    $query->execute(array($idMember['id'], $year, $month, $day, $_SESSION['currentPlanningId']));

    return $query->rowCount();
  }

  public function addDescription($desc, $member, $day, $month, $year)
  {
    $this->planningUpdated();

    $queryIdMember = $this->db->prepare("SELECT id FROM members WHERE name = ? AND idPlanning = ?");
    $queryIdMember->execute(array($member, $_SESSION['currentPlanningId']));
    $idMember = $queryIdMember->fetch();

    $query = $this->db->prepare("UPDATE labels SET description = ? WHERE idMember = ? AND idYear = ? AND idMonth = ? AND idDay = ? AND idPlanning = ?");

    $query->execute(array($desc, $idMember['id'], $year, $month, $day, $_SESSION['currentPlanningId']));

    return $query->rowCount();
  }

  public function addMember($name)
  {
    $this->planningUpdated();

    $queryCheck = $this->db->prepare("SELECT * FROM members WHERE name = ? AND idPlanning = ?");
    $queryCheck->execute(array($name, $_SESSION['currentPlanningId']));

    if ($queryCheck->rowCount() == 0)
    {
      $query = $this->db->prepare("SELECT COUNT(*) FROM members WHERE idPlanning = ?");
      $query->execute(array($_SESSION['currentPlanningId']));
      $sort = $query->fetch()[0];

      $query = $this->db->prepare("INSERT INTO members VALUES('', ?, ?, ?)");

      if (!$query->execute(array($name, $_SESSION['currentPlanningId'], $sort)))
	return false;

      return true;
    }
    else
      return 3;
  }

  public function deleteMember($name)
  {
    $this->planningUpdated();

    $query = $this->db->prepare("SELECT sort FROM members WHERE name = ? AND idPlanning = ?");
    $query->execute(array($name, $_SESSION['currentPlanningId']));
    $index = $query->fetch()[0];

    $query = $this->db->prepare("UPDATE members SET sort = sort - 1 WHERE sort > ? AND idPlanning = ?");
    $query->execute(array($index, $_SESSION['currentPlanningId']));

    $query = $this->db->prepare("DELETE FROM members WHERE name = ? AND idPlanning = ?");
    $query->execute(array($name, $_SESSION['currentPlanningId']));

    return $query->rowCount();
  }

  public function modifyPass($pw)
  {
    $query = $this->db->prepare("UPDATE users SET password = ? WHERE id = ?");

    $query->execute(array($pw, $_SESSION['idUser']));

    return $query->rowCount();
  }

  public function planningUpdated()
  {
    $query = $this->db->prepare("UPDATE plannings SET date = CURDATE() WHERE id = ?");
    $query->execute(array($_SESSION['currentPlanningId']));
  }

  public function modifyGuestPass($pw)
  {
    $query = $this->db->prepare("UPDATE users SET guestpass = ? WHERE id = ?");

    $query->execute(array($pw, $_SESSION['idUser']));

    return $query->rowCount();
  }

  public function modifyMember($name, $oldName)
  {
    $this->planningUpdated();

    $query = $this->db->prepare("UPDATE members SET name = ? WHERE name = ? AND idPlanning = ?");

    $query->execute(array($name, $oldName, $_SESSION['currentPlanningId']));

    return $query->rowCount();
  }

  public function messagePlanning($message)
  {
    $this->planningUpdated();

    $query = $this->db->prepare("UPDATE plannings SET message = ? WHERE id = ?");

    $query->execute(array($message, $_SESSION['currentPlanningId']));

    return $query->rowCount();
  }

  public function modifyPlanning($name)
  {
    $this->planningUpdated();

    $query = $this->db->prepare("UPDATE plannings SET name = ? WHERE id = ?");

    $query->execute(array($name, $_SESSION['currentPlanningId']));

    return $query->rowCount();
  }

  public function modifyType($name, $id, $color)
  {
    $this->planningUpdated();

    $query = $this->db->prepare("UPDATE types SET name = ?, color = ? WHERE id = ? AND idPlanning = ?");

    $query->execute(array($name, $color, $id, $_SESSION['currentPlanningId']));

    return $query->rowCount();
  }

  public function deletePlanning()
  {
    $this->cleanPlanning();

    $query = $this->db->prepare("DELETE FROM plannings WHERE id = ?");
    $query->execute(array($_SESSION['currentPlanningId']));

    return $query->rowCount();
  }

  public function getAllLabels()
  {
    $query = $this->db->prepare("SELECT * FROM labels WHERE idPlanning = ?");
    $query->execute(array($_SESSION['currentPlanningId']));

    if ($query->rowCount() > 0)
      while($row = $query->fetch())
	$result[] = $row;
    else
      $result = [];

    return $result;
  }

  public function sortMember($name, $old_index, $new_index)
  {
    $this->planningUpdated();

    if ($new_index > $old_index)
      $query = $this->db->prepare("UPDATE members SET sort = sort - 1 WHERE sort <= ? AND sort >= ? AND idPlanning = ?");
    else
      $query = $this->db->prepare("UPDATE members SET sort = sort + 1 WHERE sort >= ? AND sort <= ? AND idPlanning = ?");
    $query->execute(array($new_index, $old_index, $_SESSION['currentPlanningId']));

    $query = $this->db->prepare("UPDATE members SET sort = ? WHERE name = ? AND idPlanning = ?");
    $query->execute(array($new_index, $name, $_SESSION['currentPlanningId']));

    return $result;
  }

  public function cleanPlanning()
  {
    // Clean planning
    $query = $this->db->prepare("DELETE FROM types WHERE idPlanning = ?");
    $query->execute(array($_SESSION['currentPlanningId']));
    $query = $this->db->prepare("DELETE FROM labels WHERE idPlanning = ?");
    $query->execute(array($_SESSION['currentPlanningId']));
    $query = $this->db->prepare("DELETE FROM members WHERE idPlanning = ?");
    $query->execute(array($_SESSION['currentPlanningId']));
  }

  public function importPlanning($data)
  {
    $this->cleanPlanning();

    // Insert new planning
    // Add each members
    foreach ($data['members'] as $member)
    {
      $this->addMember($member['name']);
      echo $member['id'] . " - " . $member['name'] . '<br>';
      $memberToId[$member['id']] = $this->db->lastInsertId();
    }
    // Add each types
    foreach ($data['types'] as $type)
    {
      $this->addType($type['name'], $type['color']);
      $typeToId[$type['id']] = $this->db->lastInsertId();
    }
    // Add labels with associeted new type and member
    foreach ($data['labels'] as $label)
      $this->addLabelById("", $typeToId[$label['idType']], $memberToId[$label['idMember']], $label['idDay'], $label['idMonth'], $label['idYear']);
  }
}

?>
