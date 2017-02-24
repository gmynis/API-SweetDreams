<?php


class Controller_relusersitems extends Controller_Base
{


//CREAR UNA COMPRA (PARAMETROS REQUERIDOS: IDUSUARIO, IDITEM)-------------------------------------------
public function post_buy()
	{
		$rel_users_items = new Model_Relusersitems();

		$fk_users = Input::post('fk_users');
		$fk_items = Input::post('fk_items');
		$unidades = Input::post('unidades');

        $rel_users_items->fk_users = $fk_users;
        $rel_users_items->fk_items = $fk_items;
        $rel_users_items->unidades = $unidades;


		
        	if (empty($fk_items) or empty($fk_users))
        	{
        		return $this->notice($code = 'ERROR', $message = 'YOU NEED USER, ITEM AND UNITS TO PURCHASE.');
        	}
        	else 
        	{
        		try
        		{
        			$rel_users_items->save();
        			return $this->notice($code = 'SUCCESSFUL ACTION', $message = 'ITEM BOUGHT.');
        		}
        		catch(exception $e)
        		{
        			return $this->notice($code = 'ERROR', $message = 'THIS ITEM IS ALREDY BOUGHT.');
        		}
        	}
        }




//FUNCION BORRAR COMPRA POR ID (PARAMETROS REQUERIDOS: ID_COMPRA)----------------------------------------------------------------------

	public function post_delete($id = null)
	{
		try
		{
			if($id != null)
			{
				if($this->check())
				{
					$compra = new Model_Relusersitems();
					$compra = Model_Relusersitems::find('all', array('where' => array(array('id', $id),)));
			
						foreach ($compra as $key)
						{
							$key -> delete();
							return $this->notice($code = 'SUCCESSFUL ACTION', $message = 'COMPRA DELETED.');
						}

					if (!empty($compra))
					{
						return $compra;
					}
					else return $this->notice($code = 'ERROR', $message = 'COMPRA NOT FOUND OR DOES NOT EXIST.');
				}
				else return $this->notice($code = 'ERROR', $message = 'REQUIRE AUTHENTICATION.');
			}
			else return $this->notice($code = 'ERROR', $message = 'EXPECTED ID_COMPRA IN URL.');
		}
		catch(exception $e)
		{
			return $this->notice($code = 'ERROR', $message = 'INCORRECT AUTHENTICATION.');
		}
	}  











}