<?php

use Doctrine\ORM\Mapping\ClassMetadataInfo;

$metadata->setInheritanceType(ClassMetadataInfo::INHERITANCE_TYPE_NONE);
$metadata->setPrimaryTable(array(
   'name' => 'capture',
  ));
$metadata->setChangeTrackingPolicy(ClassMetadataInfo::CHANGETRACKING_DEFERRED_IMPLICIT);
$metadata->mapField(array(
   'fieldName' => 'id',
   'columnName' => 'id',
   'type' => 'integer',
   'nullable' => false,
   'options' => 
   array(
   'unsigned' => false,
   ),
   'id' => true,
  ));
$metadata->mapField(array(
   'fieldName' => 'position',
   'columnName' => 'Position',
   'type' => 'string',
   'nullable' => false,
   'length' => 255,
   'options' => 
   array(
   'fixed' => false,
   ),
  ));
$metadata->mapField(array(
   'fieldName' => 'captureimg',
   'columnName' => 'CaptureImg',
   'type' => 'string',
   'nullable' => false,
   'length' => 255,
   'options' => 
   array(
   'fixed' => false,
   ),
  ));
$metadata->mapField(array(
   'fieldName' => 'date',
   'columnName' => 'Date',
   'type' => 'datetime',
   'nullable' => false,
  ));
$metadata->mapField(array(
   'fieldName' => 'prix',
   'columnName' => 'Prix',
   'type' => 'float',
   'nullable' => false,
   'precision' => 10,
   'scale' => 0,
  ));
$metadata->setIdGeneratorType(ClassMetadataInfo::GENERATOR_TYPE_IDENTITY);