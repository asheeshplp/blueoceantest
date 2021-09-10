<?php
/**
 * The Soaplib class defines the `GetInstance` method that serves as an
 * alternative to constructor and lets clients access the same instance of this
 * class over and over.
 */
class Soaplib
{
    /**
     * The Soaplib's instance is stored in a static field. This field is an
     * array, because we'll allow our Soaplib to have subclasses. Each item in
     * this array will be an instance of a specific Soaplib's subclass. 
     */
    private static $instances = [];
    
	private $wsdl = null, $client = null;

    /**
     * The Soaplib's constructor should always be private to prevent direct
     * construction calls with the `new` operator.
     */
    protected function __construct() { 
		$this->wsdl   = 	"https://www.crcind.com/csp/samples/SOAP.Demo.CLS?WSDL";
		$this->client = 	new SoapClient($this->wsdl, array('trace'=>1)); 
	}

    /**
     * Soaplibs should not be cloneable.
     */
    protected function __clone() { }

    /**
     * Soaplibs should not be restorable from strings.
     */
    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a Soaplib.");
    }

    /**
     * This is the static method that controls the access to the Soaplib
     * instance. On the first run, it creates a Soaplib object and places it
     * into the static field. On subsequent runs, it returns the client existing
     * object stored in the static field.
     *
     * This implementation lets you subclass the Soaplib class while keeping
     * just one instance of each subclass around.
     */
    public static function getInstance(): Soaplib
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
    }

    /**
     * listPeople function retrieve and list all people who start with the letter “a”     
     * executed on its instance.
     */
    public function listPeople() {
        try {
			$responce_param = $this->client->GetByName();   
			$result = $responce_param->GetByNameResult->any;
			$explodedArr	=	explode(",", $result);
			$finalArr = array();
			if(!empty($explodedArr)) {
				$counter = 1;
				foreach($explodedArr as $currentItem) {
					if((strcmp(substr($currentItem, 0, 1),"A")==0) || (strcmp(substr($currentItem, 0, 1),"a")==0))
					{
						$finalArr[$counter] = $currentItem;				
						$counter++;
					}		
				}
			}
			return $finalArr;
		} catch (Exception $e) { 
			echo "<h2>Exception Error!</h2>"; 
			echo $e->getMessage(); 
		}
    }
}
?>