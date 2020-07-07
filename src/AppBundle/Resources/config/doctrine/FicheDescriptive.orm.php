<?php

use Doctrine\ORM\Mapping\ClassMetadataInfo;

$metadata->setInheritanceType(ClassMetadataInfo::INHERITANCE_TYPE_NONE);
$metadata->setPrimaryTable(array(
   'name' => 'fiche_descriptive',
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
   'fieldName' => 'libelle',
   'columnName' => 'Libelle',
   'type' => 'string',
   'nullable' => false,
   'length' => 255,
   'options' => 
   array(
   'fixed' => false,
   ),
  ));
$metadata->mapField(array(
   'fieldName' => 'poids',
   'columnName' => 'Poids',
   'type' => 'float',
   'nullable' => false,
   'precision' => 10,
   'scale' => 0,
  ));
$metadata->mapField(array(
   'fieldName' => 'couleur',
   'columnName' => 'Couleur',
   'type' => 'string',
   'nullable' => false,
   'length' => 255,
   'options' => 
   array(
   'fixed' => false,
   ),
  ));
$metadata->mapField(array(
   'fieldName' => 'datefabrication',
   'columnName' => 'DateFabrication',
   'type' => 'datetime',
   'nullable' => false,
  ));
$metadata->setIdGeneratorType(ClassMetadataInfo::GENERATOR_TYPE_IDENTITY);