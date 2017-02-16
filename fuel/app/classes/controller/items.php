<?php

class Controller_Items extends Controller_Base
{

//FUNCION MOSTRAR TODOS LOS ITEMS REGISTRADOS (PARAMETROS REQUERIDOS: TOKEN)-------------------------------------------------

    public function get_items()
    {
        try
        {
            if($this->check())
            {
                $items = Model_Items::find('all');
                return $items;
            }
            else return $this->notice($code = 'ERROR', $message = 'REQUIRE AUTHENTICATION.');
        }
        catch(exception $e)
        {
            return  $this->notice($code = 'ERROR', $message = 'INCORRECT AUTHENTICATION.');
        }
    }


//FUNCION BUSCAR ITEM POR ID (PARAMETROS NECESARIOS: ID)---------------------------------------------------------------------

    public function get_item($id = null)
    {

        try
        {
            if ($id != null)
            {
                if ($this->check()) 
                {
                    $item = Model_Items::find ('all', array('where' => array(array('id', $id),)));

                    if (!empty($item))
                    {
                        return $item;
                    }
                    else return $this->notice($code = 'ERROR', $message = 'ITEM NOT FOUND OR DOES NOT EXIST.');
                }
                else return $this->notice($code = 'ERROR', $message = 'REQUIRE AUTHENTICATION.');
            }
            else return $this->notice($code = 'ERROR', $message = 'EXPECTED ID_USER IN URL.');
        }
        catch(exception $e)
        {
            return  $this->notice($code = 'ERROR', $message = 'INCORRECT AUTHENTICATION.');
        }
    }

//FUNCION CREAR ITEM (PARAMETROS REQUERIDOS: NAME, DESCRIPTION, PRIZE AND IMAGE)---------------------------------------------

    public function post_create()
    {
		$item = new Model_Items();

		$name = Input::post('name');
		$description = Input::post('description');
		$prize = Input::post('prize');
		$image = Input::post('image');

        $item->name = $name;
        $item->description = $description;
        $item->prize = $prize;
        $item->image = $image;


        	if (empty($name) or empty($description)or empty($prize) or empty($image))
        	{
        		return $this->notice($code = 'ERROR', $message = 'YOU NEED NAME, DESCRIPTION, PRIZE AND IMAGE TO CREATE A ITEM.');
        	}
        	else 
        	{
        		try
        		{
        			$item->save();
        			return $this->notice($code = 'SUCCESSFUL ACTION', $message = 'ITEM.');
        		}
        		catch(exception $e)
        		{
        			return $this->notice($code = 'ERROR', $message = 'THIS ITEM ALREDY EXIST.');
        		}
        	}
    }

}


















