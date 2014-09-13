<?php

App::uses('AppModel', 'Model');

/**
 * Game Model
 *
 * @property Row $Row
 */
class Game extends AppModel {
    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Row' => array(
            'className' => 'Row',
            'foreignKey' => 'game_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );
    public $belongsTo = array(
        'Liga' => array(
            'className' => 'Liga',
            'foreignKey' => 'liga_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

}
