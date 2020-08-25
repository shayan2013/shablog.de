<?php
	function xmlData($lastId, $name) {
		$xmldoc = new DOMDocument();
		$xmldoc->formatOutput = true;
		$xmldoc->preserveWhiteSpace = false;
		$xmldoc->load('Dokumentation/datensicherungXML.xml');
		
		$root = $xmldoc->firstChild;
		$newElement = $xmldoc->createElement('id');
		$root->appendChild($newElement);
		$newText = $xmldoc->createTextNode($lastId);
		$newElement->appendChild($newText);		

		$newElement = $xmldoc->createElement('name');
		$root->appendChild($newElement);
		$newText = $xmldoc->createTextNode($name);
		$newElement->appendChild($newText);		
		
		$xmldoc->save('Dokumentation/datensicherungXML.xml');
	}
?>