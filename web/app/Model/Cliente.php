<?php
App::uses('AppModel', 'Model');
/**
 * Cliente Model
 *
 */
class Cliente extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'username';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'username' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'password' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//
	public function nuevo($data) {
		$data['Cliente']['password'] = md5($data['Cliente']['password']);
		unset($data['Cliente']['hash_session']);
		unset($data['Cliente']['sig_codigo']);
		$data['Cliente']['clave_cifrar'] = $this->hash(10);
		$this->create();
		$this->save($data);
		return true;
	}//

	function hash( $length = 8 ) {
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
		$password = substr( str_shuffle( $chars ), 0, $length );
		return $password;
	}

	function validarRodante($hash_session = '', $clave_verificacion = '') {
		$options = array('conditions' => array('Cliente.hash_session' => $hash_session));
		$cliente = $this->find('first', $options);
		if (empty($cliente) || $cliente['Cliente']['sig_codigo'] == '') {
			return false;
		}
		$cv = md5($cliente['Cliente']['sig_codigo'] . $cliente['Cliente']['clave_cifrar']);
		$this->saveField('sig_codigo', '');
		return ($clave_verificacion == $cv);
	}
}
