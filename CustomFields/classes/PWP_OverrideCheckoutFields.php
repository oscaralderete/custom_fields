<?php
/*
@author Oscar Alderete <oscaralderete@gmail.com>
@website http://oscaralderete.com
@generator NetBeans IDE 8.1
*/
class PWP_OverrideCheckoutFields{

private $defaultCountry='PE';
private $defaultState='LMA';
private $hideFields=true;
private $districts=[
	'Cercado, Lima 1'=>'Cercado',
	'Ancón, Lima 2'=>'Ancón',
	'Ate, Lima 3'=>'Ate',
	'Barranco, Lima 4'=>'Barranco',
	'Breña, Lima 5'=>'Breña',
	'Carabayllo, Lima 6'=>'Carabayllo',
	'Comas, Lima 7'=>'Comas',
	'Chaclacayo, Lima 8'=>'Chaclacayo',
	'Chorrillos, Lima 9'=>'Chorrillos',
	'El Agustino, Lima 10'=>'El Agustino',
	'Jesús María, Lima 11'=>'Jesús María',
	'La Molina, Lima 12'=>'La Molina',
	'La Victoria, Lima 13'=>'La Victoria',
	'Lince, Lima 14'=>'Lince',
	'Lurigancho, Lima 15'=>'Lurigancho',
	'Lurín, Lima 16'=>'Lurín',
	'Magdalena, Lima 17'=>'Magdalena',
	'Miraflores, Lima 18'=>'Miraflores',
	'Pachacamac, Lima 19'=>'Pachacamac',
	'Pucusana, Lima 20'=>'Pucusana',
	'Pueblo Libre, Lima 21'=>'Pueblo Libre',
	'Puente Piedra, Lima 22'=>'Puente Piedra',
	'Punta Negra, Lima 23'=>'Punta Negra',
	'Punta Hermosa, Lima 24'=>'Punta Hermosa',
	'Rímac, Lima 25'=>'Rímac',
	'San Bartolo, Lima 26'=>'San Bartolo',
	'San Isidro, Lima 27'=>'San Isidro',
	'Independencia, Lima 28'=>'Independencia',
	'San Juan de Miraflores, Lima 29'=>'San Juan de Miraflores',
	'San Luis, Lima 30'=>'San Luis',
	'San Martín de Porres, Lima 31'=>'San Martín de Porres',
	'San Miguel, Lima 32'=>'San Miguel',
	'Santiago de Surco, Lima 33'=>'Santiago de Surco',
	'Surquillo, Lima 34'=>'Surquillo',
	'Villa María del Triunfo, Lima 36'=>'Villa María del Triunfo',
	'San Juan de Lurigancho, Lima 36'=>'San Juan de Lurigancho',
	'Santa María del Mar, Lima 37'=>'Santa María del Mar',
	'Santa Rosa, Lima 38'=>'Santa Rosa',
	'Los Olivos, Lima 39'=>'Los Olivos',
	'Cieneguilla, Lima 40'=>'Cieneguilla',
	'San Borja, Lima 41'=>'San Borja',
	'Villa El Salvador, Lima 42'=>'Villa El Salvador2',
	'Santa Anita, Lima 43'=>'Santa Anita'
];

public function init(){
	add_filter('woocommerce_checkout_fields',[$this,'checkout_fields'],20,1);
	add_action('woocommerce_form_field_hidden',[$this,'hidden_fields_html'],20,1);
}

public function checkout_fields($fields){
	//unsetting unnecessary fields
	unset($fields['billing']['billing_address_2']);
	unset($fields['billing']['billing_company']);
	if($this->hideFields){
		//hidding default fields
		$fieldType=$this->hideFields?'hidden':'text';
		$fields['billing']['billing_country']['type']=$fieldType;
		$fields['billing']['billing_state']['type']=$fieldType;
		$fields['billing']['billing_postcode']['type']=$fieldType;
		//POSTCODE isn't required anymore
		$fields['billing']['billing_postcode']['required'] = false;
		//CITY is a select now
		$fields['billing']['billing_city']['type']='select';
		$fields['billing']['billing_city']['class']=array('input-text');
		$fields['billing']['billing_city']['options']=$this->districts;
	}
	return $fields;
}

/*public function default_country(){return $this->defaultCountry;}

public function default_state(){return $this->defaultState;}*/

public function hidden_fields_html(){
	$field='';
	if($this->hideFields){
		$field='<input name="billing_country" id="billing_country" value="'.$this->defaultCountry.'" type="hidden">';
		$field.='<input name="billing_state" id="billing_state" value="'.$this->defaultState.'" type="hidden">';
	}
	return $field;
}

}