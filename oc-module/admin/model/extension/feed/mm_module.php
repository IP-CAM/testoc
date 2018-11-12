<?php
class ModelExtensionFeedMmModule extends Model {

	public function addProduct($data) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "product SET model='".$this->db->escape($data['model']) . "',  date_added = NOW()");	

		$product_id = $this->db->getLastId();
	
		foreach ($data['product_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "product_description SET product_id = '" . (int)$product_id . "', language_id = '" . (int)$language_id . "', name = '" . $this->db->escape($value['name']) . "', meta_title = '" . $this->db->escape($value['meta_title'])."'" );
		}

		
		$this->db->query("INSERT INTO " . DB_PREFIX . "product_to_store SET product_id = '" . (int)$product_id . "', store_id = '0'");
			
		

	}

}
