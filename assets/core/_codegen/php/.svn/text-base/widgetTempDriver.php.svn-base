<?php
class widgetTempDriver{	
		private static $debugStack = false;
		private static $debug = false;
		public static function renderTempFromFile($fileName, $mixArgumentArray, $nDebug = false, $nDebugStack = false){
			self::$debug = $nDebug;
			self::$debugStack = $nDebugStack;
			//$fileName = "templates/firstTemplate.txt";
			$handle = fopen($fileName, "r");
			$template = fread($handle, filesize($fileName));
			return self::parseTemplate($template, $mixArgumentArray);
		}
		public static function db($message, $value){
			if(self::$debug){
				echo "<br>----------------------------------------------<br>";
				echo $message . " : " . $value;
				echo "<br>----------------------------------------------<br>";
			}
		}
		public static function parseTemplate($strTemplate, $mixArgumentArray){
			

			$stackCount = 0;
			
			$strTemplate = str_replace("\r", '', $strTemplate);

			
			if ($mixArgumentArray) foreach ($mixArgumentArray as $strName=>$mixValue) {
				$$strName = $mixValue;
			}
			// Look for the Escape Begin
			$intPosition = strpos($strTemplate, ESCAPE_IDENT_BEGIN);
		
			$escapeIdentBeginLen = strlen(ESCAPE_IDENT_BEGIN);
			$escapeIdentEndLen = strlen(ESCAPE_IDENT_END);
			while ($intPosition !== false) {
				$intPositionEnd = strpos($strTemplate, ESCAPE_IDENT_END, $intPosition);	
				$strStatement = substr($strTemplate, $intPosition + $escapeIdentBeginLen, $intPositionEnd - $intPosition - $escapeIdentEndLen);
				$strStatement = trim($strStatement);
				if(substr($strStatement, 0, 1) == "="){
					// Remove Trailing ';' if applicable
					if (substr($strStatement, strlen($strStatement) - 1) == ';')
						$strStatement = trim(substr($strStatement, 0, strlen($strStatement) - 1));

					// Remove Head '='
					$strStatement = trim(substr($strStatement, 1));
					
					// Add 'return' eval
					$strStatement = sprintf('return (%s);', $strStatement);
					$strStatement = eval($strStatement);
				}elseif("}"== $strStatement){
					 $strStatement = "";
					//Do nothing
					//Maybe some stack option
				}else{
					$ii = 0;
					// Figure out the Command and calculate SubTemplate
					$strCommand = substr($strStatement, 0, strpos($strStatement, ' '));
					switch ($strCommand) {
						case 'addcss':
						
							$strFullStatement = $strStatement;

							// Remove leading 'foreach' and trailing '{'
							$strStatement = substr($strStatement, strlen('addcss'));
							$strStatement = substr($strStatement, 0, strlen($strStatement) - 1);
							$strStatement = trim($strStatement);
							
							// Ensure that we've got a "(" and a ")"
							if ((substr($strStatement,0,1) != '(') ||
								(substr($strStatement, strlen($strStatement)-1) != ')'))
								throw new Exception("Improperly Formatted foreach: $strFullStatement");
							$strStatement = trim(substr($strStatement, 1, strlen($strStatement) - 2));
							
							$tCss = new cssAssetObj($strStatement);
							$strStatement = "";
						break;
						case 'removeInnerBox':
						
							$strFullStatement = $strStatement;

							// Remove leading 'foreach' and trailing '{'
							$strStatement = substr($strStatement, strlen('removeInnerBox'));
							$strStatement = substr($strStatement, 0, strlen($strStatement) - 1);
							$strStatement = trim($strStatement);
							
							// Ensure that we've got a "(" and a ")"
							if ((substr($strStatement,0,1) != '(') ||
								(substr($strStatement, strlen($strStatement)-1) != ')'))
								throw new Exception("Improperly Formatted foreach: $strFullStatement");
							$strStatement = trim(substr($strStatement, 1, strlen($strStatement) - 2));
							
							//Add 
							$cWidget = renderPage::getCurrWidget();
                            if(isset($cWidget)){
                                $cWidget->setBordersDisp(false);
                            }else{
                                throw new Exception("RenderPage::getCurrWidget() returning non object");

                            }
							$strStatement = "";
						break;	
						case 'addJS':
						
							// Remove leading 'foreach' and trailing '{'
							$strStatement = substr($strStatement, strlen('addJS'));
							$strStatement = substr($strStatement, 0, strlen($strStatement) - 1);
							$strStatement = trim($strStatement);
							
							// Ensure that we've got a "(" and a ")"
							if ((substr($strStatement,0,1) != '(') ||
								(substr($strStatement, strlen($strStatement)-1) != ')'))
								throw new Exception("Improperly Formatted foreach: $strFullStatement");
							$strStatement = trim(substr($strStatement, 1, strlen($strStatement) - 2));
							
							$tCss = new jsAssetObj($strStatement);
							$strStatement = "";
						break;
						case 'foreach':
							$strFullStatement = $strStatement;

							// Remove leading 'foreach' and trailing '{'
							$strStatement = substr($strStatement, strlen('foreach'));
							$strStatement = substr($strStatement, 0, strlen($strStatement) - 1);
							$strStatement = trim($strStatement);
							
							// Ensure that we've got a "(" and a ")"
							if ((substr($strStatement,0,1) != '(') ||
								(substr($strStatement, strlen($strStatement)-1) != ')'))
								throw new Exception("Improperly Formatted foreach: $strFullStatement");
							$strStatement = trim(substr($strStatement, 1, strlen($strStatement) - 2));
							
							// Pull out the two sides of the "as" clause
							$strStatement = explode(' as ', $strStatement);
							if (count($strStatement) != 2)
								throw new Exception("Improperly Formatted foreach: $strFullStatement");
							
							$objArray = eval(sprintf('return %s;', trim($strStatement[0])));
							$strSingleObjectName = trim($strStatement[1]);
							$strNameKeyPair = explode('=>', $strSingleObjectName);

							if (count($strNameKeyPair) == 2) {
								$strSingleObjectKey = trim($strNameKeyPair[0]);
								$strSingleObjectValue = trim($strNameKeyPair[1]);
								
								// Remove leading '$'
								$strSingleObjectKey = substr($strSingleObjectKey, 1);
								$strSingleObjectValue = substr($strSingleObjectValue, 1);

								// Iterate to setup strStatement
								$strStatement = '';
								if ($objArray) foreach ($objArray as $$strSingleObjectKey => $$strSingleObjectValue) {
									$mixArgumentArray[$strSingleObjectKey] = $$strSingleObjectKey;
									$mixArgumentArray[$strSingleObjectValue] = $$strSingleObjectValue;
									
									$strStatement .= self::parseTemplate($strSubTemplate, $mixArgumentArray);
								}
							} else {
								// Remove leading '$'
								
								$strSingleObjectName = substr($strSingleObjectName, 1);
								$tInitPosStart = strpos($strTemplate, "{", $intPosition);
								$tInitPosEnd = self::findClosingTag(substr($strTemplate, $tInitPosStart + 1));
								$strSubTemplate = substr($strTemplate, $tInitPosStart + 1, $tInitPosEnd);
								$strSubTemplate = trim($strSubTemplate); 
								$endSubPos = $tInitPosStart + 1 + $tInitPosEnd + 1;
								$strTemplate = substr($strTemplate, 0, $tInitPosStart) . "\n" . substr($strTemplate, $endSubPos);
								//Add tags for parser
								$strSubTemplate = sprintf("%s%s%s", ESCAPE_IDENT_BEGIN , $strSubTemplate , ESCAPE_IDENT_END); 
								
								// Iterate to setup strStatement
								$strStatement = '';
								if ($objArray){
									$i = 0;
								 	foreach ($objArray as $$strSingleObjectName) {
										
										$mixArgumentArray[$strSingleObjectName] = $$strSingleObjectName;
									
										$tStatment = self::parseTemplate($strSubTemplate, $mixArgumentArray);
										$tStatment = str_replace("'", "\'", $tStatment);
										$tStrStatement = sprintf("return '%s';", $tStatment);
										
										$strStatement .= eval($tStrStatement);
										
									}
								}
								
							}
							
						break;
						case 'if':
							$strFullStatement = $strStatement;

							// Remove leading 'if' and trailing '{'
							$strStatement = substr($strStatement, strlen('if'));
							$strStatement = substr($strStatement, 0, strlen($strStatement) - 1);
							$strStatement = trim($strStatement);
							
							
							
							
					
							$tInitPosStart = strpos($strTemplate, "{", $intPosition);
							$tInitPosEnd = self::findClosingTag(substr($strTemplate, $tInitPosStart + 1));
							$strSubTemplate = substr($strTemplate, $tInitPosStart + 1, $tInitPosEnd);
							$strSubTemplate = trim($strSubTemplate); 
							$endSubPos = $tInitPosStart + 1 + $tInitPosEnd + 1;
							$strTemplate = substr($strTemplate, 0, $tInitPosStart) . "\n" . substr($strTemplate, $endSubPos);
							//Add tags for parser
							$strSubTemplate = sprintf("%s%s%s", ESCAPE_IDENT_BEGIN , $strSubTemplate , ESCAPE_IDENT_END); 
							
							
							
							
							
							//echo("Bool:" .eval(sprintf('return (%s);', $strStatement)) . "<br><br>");
							
							if (eval(sprintf('return (%s);', $strStatement))) {
								$strStatement = self::parseTemplate($strSubTemplate, $mixArgumentArray);
							}else{
								$strStatement = '';
							}
							//echo $strStatement . "<br><br>";
						break;
						
						default:
							//die("Invalid OpenEnded Command: $strStatement in " . __FILE__ . " Line: " . __LINE__);
							//throw new Exception("Invalid OpenEnded Command: $strStatement in " . __FILE__ . " Line: " . __LINE__);
							self::db("i", $strStatement);
							$strStatement = eval($strStatement);// or die("Invalid OpenEnded Command: $strStatement in " . __FILE__ . " Line: " . __LINE__);				
							self::db("stmt", $strStatement);
							$strStatement = "";
						break;
						
					}
					
				}
				
				$strTemplate = substr($strTemplate, 0, $intPosition) . $strStatement . substr($strTemplate, $intPositionEnd + $escapeIdentEndLen);
				//echo $strTemplate."<br>--------------------------<br>";
				$intPosition = strpos($strTemplate,ESCAPE_IDENT_BEGIN);
				
			}
			$strTemplate = str_replace("<##%", "<%", $strTemplate);
			$strTemplate = str_replace("%##>", "%>", $strTemplate);
			return $strTemplate;
		
		}
		public static function debugStack($note, $str, $nextOpen){
			if(self::$debugStack == true){
				echo $note . ": " . self::highLight($str, $nextOpen) . "<br/><br/>";
			}
		}
		public static function findClosingTag($str){
			//Assume were already in level 1;
			$stack = 1;
			$nextOpen = strpos($str, "{");
			self::debugStack("OPEN", $str, $nextOpen) . "<br/><br/>";
			while(self::isNonCode($str, $nextOpen) && ($nextOpen != false)){
				$nextOpen = strpos($str, "{", $nextOpen+1);
				self::debugStack("OPEN", $str, $nextOpen) . "<br/><br/>";
			}
			
			$nextClose = strpos($str, "}");
			self::debugStack("CLOSE", $str, $nextClose) . "<br/><br/>";
			while(self::isNonCode($str, $nextClose) && ($nextClose != false)){
				$nextClose = strpos($str, "}", $nextClose+1);
				self::debugStack("CLOSE", $str, $nextClose) . "<br/><br/>";
			}
			
			$i = 0;
			while($nextClose !== false) {
			
				if(($nextOpen <= $nextClose) && $nextOpen != false){
					$stack += 1;
					$initOff = $nextOpen+1;
					
				}else{
					$stack -= 1;
					$initOff = $nextClose+1;
				}
				if($stack == 0){
					return $nextClose;	
				}
				//MOST USEFUL DEBUG FUNCTION EVER DO NOT DELETE
				
				
				$nextOpen = strpos($str, "{", $initOff);
				self::debugStack("OPEN", $str, $initOff) . "<br/><br/>";
				while(self::isNonCode($str, $nextOpen) && ($nextOpen != false)){
					$nextOpen = strpos($str, "{", $nextOpen+1);
					self::debugStack("OPEN", $str, $nextOpen) . "<br/><br/>";
				}
				
				$nextClose = strpos($str, "}" , $initOff);
				self::debugStack("CLOSE", $str, $nextClose) . "<br/><br/>";
				while(self::isNonCode($str, $nextClose) && ($nextClose != false)){
					$nextClose = strpos($str, "}", $nextClose+1);
					self::debugStack("CLOSE", $str, $nextClose) . "<br/><br/>";
				}
				//echo($nextOpen . "//" .$nextClose . "<br>");
				//echo("Stack:" . $stack . "<br>");
				
				if($stack > 100){ 
					die("stuck");
				}
			}
			if($stack != 0){
				die("No closing } found<br/>Stack Died at :" . $stack);
			}
			
		}
		public static function isNonCode($str, $pos){
			
			$nonCodeFlag = true;
			$codeStr = '';
			$intPositionEnd = strpos($str, ESCAPE_IDENT_END);
			$escapeIdentBeginLen = strlen(ESCAPE_IDENT_BEGIN);
			$escapeIdentEndLen = strlen(ESCAPE_IDENT_END);
			//$codeStr = substr($str, $intPositionEnd + $escapeIdentEndLen);
			$intPositionStart = strpos($str, ESCAPE_IDENT_BEGIN, $intPositionEnd + $escapeIdentEndLen);
			while ($intPositionStart !== false) {
				
				/*
				* - Note: At some point we may need to acomidate for the "<?php=" with the equals symbol and cut that out
				
				*/
				
			
				$intPositionEnd = strpos($str, ESCAPE_IDENT_END, $intPositionStart);
				$bol1 = ($pos > $intPositionStart + $escapeIdentBeginLen);
				$bol2 = ($pos < $intPositionEnd);
				$intPositionStart = strpos($str, ESCAPE_IDENT_BEGIN, $intPositionEnd + $escapeIdentEndLen);
				//echo("Bool:" . ($intPositionStart + $escapeIdentBeginLen) . "/" . $pos . "/" . ($intPositionStart + $escapeIdentBeginLen + ($intPositionEnd-$intPositionStart - $escapeIdentEndLen)) . "<br>");
				if($bol1 && $bol2){
					$nonCodeFlag = false;
				}
			
				$intPositionStart = strpos($str, ESCAPE_IDENT_BEGIN, $intPositionEnd + $escapeIdentEndLen);
			}
			
			return $nonCodeFlag;
			
		}
		public static function highLight($str, $pos){
			$preStr = substr($str, 0, $pos);
			$char = substr($str, $pos, 1);
			$postStr = substr($str, $pos +1);
			$str = sprintf("%s<font color='red'><u>%s</u></font>%s", $preStr, $char, $postStr);
			return $str;
		}
		public static function hightLightCodeFromFile($fileName){
			//$fileName = "templates/firstTemplate.txt";
			$handle = fopen($fileName, "r");
			$template = fread($handle, filesize($fileName));
			return self::highlightCode($template);
		}
		public static function highlightCode($str){
			$returnStr = '';
			$codeStr = '';
			$intPositionEnd = strpos($str, ESCAPE_IDENT_END);
			$escapeIdentBeginLen = strlen(ESCAPE_IDENT_BEGIN);
			$escapeIdentEndLen = strlen(ESCAPE_IDENT_END);
			//$codeStr = substr($str, $intPositionEnd + $escapeIdentEndLen);
			
			$intPositionStart = strpos($str, ESCAPE_IDENT_BEGIN, $intPositionEnd + $escapeIdentEndLen);
			$preStr = substr($str, 0, $intPositionStart);
			
			while ($intPositionStart !== false) {
				$preStr = str_replace("<", "&lt;", $preStr);
				$preStr = str_replace(">", "&gt;", $preStr);
				$preStr = str_replace("\n", "<br/>", $preStr);
				$preStr = str_replace("\t", "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;", $preStr);
			
				
				$intPositionEnd = strpos($str, ESCAPE_IDENT_END, $intPositionStart);
				
				
				$codeStr = substr($str, $intPositionStart + $escapeIdentBeginLen - $escapeIdentBeginLen, $intPositionEnd-$intPositionStart + $escapeIdentEndLen);
				$returnStr .= sprintf("%s<font color='green'><u>%s</u></font>", $preStr, $codeStr);
				
				$intPositionStart = strpos($str, ESCAPE_IDENT_BEGIN, $intPositionEnd + $escapeIdentEndLen);
				$preStr = substr($str, $intPositionEnd  + $escapeIdentEndLen, $intPositionStart - $intPositionEnd - $escapeIdentBeginLen );		
			}
			
			$postStr = substr($str, $intPositionEnd + $escapeIdentEndLen);
			
			$postStr = str_replace("<", "&lt;", $postStr);
			$postStr = str_replace(">", "&gt;", $postStr);
			$postStr = str_replace("\n", "<br/>", $postStr);
			$postStr = str_replace("\t", "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;", $postStr);
			
			$returnStr .= $postStr;			
			
			return $returnStr;
		}
		public static function pullNonCode($str){
			$codeStr = '';
			$intPositionEnd = strpos($str, ESCAPE_IDENT_END);
			$escapeIdentBeginLen = strlen(ESCAPE_IDENT_BEGIN);
			$escapeIdentEndLen = strlen(ESCAPE_IDENT_END);
			//$codeStr = substr($str, $intPositionEnd + $escapeIdentEndLen);
			$intPositionStart = strpos($str, ESCAPE_IDENT_BEGIN, $intPositionEnd + $escapeIdentEndLen);
			while ($intPositionStart !== false) {
				/*
				* - Note: At some point we may need to acomidate for the "<?php=" with the equals symbol and cut that out
				
				*/
				
				$intPositionEnd = strpos($str, ESCAPE_IDENT_END, $intPositionStart);
				
				
				$codeStr .= substr($str, $intPositionStart + $escapeIdentBeginLen, $intPositionEnd-$intPositionStart - $escapeIdentEndLen);
				$intPositionStart = strpos($str, ESCAPE_IDENT_BEGIN, $intPositionEnd + $escapeIdentEndLen);
			}
			return $codeStr;
			
		}	





}

?>