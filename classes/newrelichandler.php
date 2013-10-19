<?php

use Intouch\Newrelic\Newrelic;

class newRelicHandler{
	static public function trackTransaction(){
		eZExecution::addCleanupHandler(function(){
			if (extension_loaded('newrelic')) {
				$newrelic = new Newrelic( true );
				$newrelic->nameTransaction( self::buildCurrentTransactionName() );
			}
		});
	}

	static function buildCurrentTransactionName(){
		$trans = array();
		if(isset($GLOBALS['eZRequestedModuleParams']))
        {
            if(isset($GLOBALS['eZRequestedModuleParams']['module_name']))
            {
                $trans[] = $GLOBALS['eZRequestedModuleParams']['module_name'];
                if(isset($GLOBALS['eZRequestedModuleParams']['function_name']))
                {
                    $trans[] = $GLOBALS['eZRequestedModuleParams']['function_name'];
                }
            }
        }

        return (count($trans)? implode($trans,'|'):'Others');
	}
}

?>