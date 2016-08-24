<?php

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType string
 * @xmlName IPPOperationEnum
 * @var IPPOperationEnum
 * @xmlDefinition Enumerates list of CUD operations
 */
class IPPOperationEnum
	{

		/**                                                                       
		* Initializes this object, optionally with pre-defined property values    
		*                                                                         
		* Initializes this object and it's property members, using the dictionary
		* of key/value pairs passed as an optional argument.                      
		*                                                                         
		* @param dictionary $keyValInitializers key/value pairs to be populated into object's properties 
		* @param boolean $verbose specifies whether object should echo warnings   
		*/                                                                        
		public function __construct($keyValInitializers=array(), $verbose=FALSE)
		{
			foreach($keyValInitializers as $initPropName => $initPropVal)
			{
				if (property_exists('IPPOperationEnum',$initPropName))
				{
					$this->{$initPropName} = $initPropVal;
				}
				else
				{
					if ($verbose)
						echo "Property does not exist ($initPropName) in class (".get_class($this).")";
				}
			}
		}

		/**
		 * @xmlType value
		 * @var string
		 */
		public $value;	const IPPOPERATIONENUM_CREATE = "create";
	const IPPOPERATIONENUM_UPDATE = "update";
	const IPPOPERATIONENUM_REVERT = "revert";
	const IPPOPERATIONENUM_DELETE = "delete";
	const IPPOPERATIONENUM_VOID = "void";
	const IPPOPERATIONENUM_SEND = "send";

} // end class IPPOperationEnum