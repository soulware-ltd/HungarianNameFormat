<?php

require_once(__DIR__ . '/hungarianNameFormatConfig.php');


$files_to_change = array();


$array = array(
    'first_name' => 'last_name',
    'last_name' => 'first_name',
        );
$name_format = new Soulware\HungarianNameFormat\hungarianNameFormatConfig('Contacts', 'editviewdefs.php', 'metadata',$array);
$files_to_change[]=$name_format;

$name_format = new Soulware\HungarianNameFormat\hungarianNameFormatConfig('Contacts', 'quickcreatedefs.php', 'metadata',$array);
$files_to_change[]=$name_format;

$name_format = new Soulware\HungarianNameFormat\hungarianNameFormatConfig('Prospects', 'editviewdefs.php', 'metadata',$array);
$files_to_change[]=$name_format;

$name_format = new Soulware\HungarianNameFormat\hungarianNameFormatConfig('Prospects', 'quickcreatedefs.php', 'metadata',$array);
$files_to_change[]=$name_format;

$name_format = new Soulware\HungarianNameFormat\hungarianNameFormatConfig('Leads', 'convertdefs.php', 'metadata',$array);
$files_to_change[]=$name_format;

$name_format = new Soulware\HungarianNameFormat\hungarianNameFormatConfig('Leads', 'editviewdefs.php', 'metadata',$array);
$files_to_change[]=$name_format;

$name_format = new Soulware\HungarianNameFormat\hungarianNameFormatConfig('Leads', 'quickcreatedefs.php', 'metadata',$array);
$files_to_change[]=$name_format;

?>
