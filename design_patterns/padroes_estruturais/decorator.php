<?php

/**
 * Intenção: Dinamicamente, agregar responsabilidades adicionais a um objeto. Os Decoradores
 * fornecem uma alternativa flexível ao uso de subclasses para extensão de funcionalidades.
 * 
 * Conceito Original do Código: VTC - Design Patterns
 */

/**
 *
 * 01. Component: define a interface para objetos que podem ter responsabilidades acrescentadas aos mesmos dinamicamente
 *
 */
abstract class Component{

	abstract public function description();

}

/**
 *
 * 02. ConcreteComponent: define um objeto para o qual responsabilidades adicionais podem ser atribuídas
 *
 */

class ConcreteComputer extends Component{

	public function __construct(){}

	public function description()
	{
		return 'Computer';
	}

}


/**
 *
 * 03. ConcreteDecorator: acrescenta responsabilidades ao ConcreteComponent
 *
 */

class ConcreteDecoratorDisk extends Component{

	public $computer;

	public function __construct( Component $computer )
	{
		$this->computer = $computer;
	}

	public function description()
	{
		return $this->computer->description() . ' and a Disk';
	}

}

class ConcreteDecoratorMonitor extends Component{

	public $computer;

	public function __construct( Component $computer )
	{
		$this->computer = $computer;
	}

	public function description()
	{
		return $this->computer->description() . ' and a Monitor';
	}

}

class Teste{

	public static function executa()
	{

		$computer	= new ConcreteComputer();

		$computer	= new ConcreteDecoratorDisk( $computer );

		$computer	= new ConcreteDecoratorMonitor( $computer );

		echo $computer->description();
	}

}

Teste::executa();