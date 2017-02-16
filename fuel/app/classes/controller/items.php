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


    //FUNCION PARA BORRAR ITEMS POR ID (PARAMETROS REQUERIDOS: ID)---------------------------------------------------

public function post_delete($id = null)
    {
        try
        {
            if($id != null)
            {
                if($this->check())
                {
                    $item = new Model_Items();
                    $item = Model_Items::find('all', array('where' => array(array('id', $id),)));
            
                        foreach ($item as $key)
                        {
                            $key -> delete();
                            return $this->notice($code = 'SUCCESSFUL ACTION', $message = 'ITEM DELETED.');
                        }

                    if (!empty($item))
                    {
                        return $item;
                    }
                    else return $this->notice($code = 'ERROR', $message = 'ITEM NOT FOUND OR DOES NOT EXIST.');
                }
                else return $this->notice($code = 'ERROR', $message = 'REQUIRE AUTHENTICATION.');
            }
            else return $this->notice($code = 'ERROR', $message = 'EXPECTED ID_ITEM IN URL.');
        }
        catch(exception $e)
        {
            return $this->notice($code = 'ERROR', $message = 'INCORRECT AUTHENTICATION.');
        }
    }

//FUNCION EDITAR USUARIO POR ID (PARAMETROS REQUERIDOS: ID, USERNAME, PASSWORD, EMAIL AND IMAGE)---------------------------------

    public function post_update($id = null)
    {
        try
        {
            if($id != null)
            {
                if($this->check())
                {
                    $user = new Model_Items();
                    $user = Model_Items::find('all', array('where' => array(array('id', $id),)));

                    $name = Input::post('name');
                    $description = Input::post('description');
                    $prize = Input::post('prize');
                    $image = Input::post('image');

                    $checkName = Model_Users::find('all', array('where' => array(array('name',$name),)));

                    if (!empty($item))
                    {
                        if (isset($name) or isset($description) or isset($prize) or isset($image))
                        {
                            if (empty($checkEmail))
                            {
                                foreach ($item as $key) 
                                {
                                    if ($key['id'] == $id )
                                    {
                                        if (isset($name))
                                        {
                                            if(!empty($name))
                                            {
                                                $key->name = $name;
                                            }
                                            else return $this->notice($code = 'ERROR', $message = 'ITEM NAME NEEDS A VALUE.');
                                        }
                                        if (isset($description))
                                        {
                                            if(!empty($description))
                                            {
                                                $key->description = $description;
                                            }
                                            else return $this->notice($code = 'ERROR', $message = 'DESCRIPTION NEEDS A VALUE.');
                                        }
                                        if (isset($prize))
                                        {
                                            if(!empty($prize))
                                            {
                                                $key->prize = $prize;
                                            }
                                            else return $this->notice($code = 'ERROR', $message = 'PRIZE NEEDS A VALUE.');
                                        }
                                        if (isset($image))
                                        {
                                            if(!empty($image))
                                            {
                                                $key->image = $image;
                                            }
                                            else return $this->notice($code = 'ERROR', $message = 'IMAGE NEEDS A VALUE.');
                                        }
                                        $key->save();
                                    }
                                }
                                return $this->notice($code = 'SUCCESSFUL ACTION', $message = 'ITEM UPDATED.');
                            }
                            //else return $this->notice($code = 'ERROR', $message = 'THE EMAIL ENTERED IS CURRENTY IN USE.');
                        }
                        else return $this->notice($code = 'ERROR', $message = 'YOU NEED AT LEAST ENTER ONE PARAMETER TO UPDATE THE DATA.');
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

}


















