<?php namespace ElasticHQ\Http\Requests;

use ElasticHQ\Http\Requests\Request;

class AddUserFormRequest extends Request {

   /**
    * Determine if the user is authorized to make this request.
    *
    * @return bool
    */
   public function authorize()
   {
      return true;
   }

   /**
    * Get the validation rules that apply to the request.
    *
    * @return array
    */
   public function rules()
   {
      return [
         'name' => 'required',
         'email' => 'required',
         // 'password' => 'required',
         'user_groups' => 'required|array'
      ];
   }
}
