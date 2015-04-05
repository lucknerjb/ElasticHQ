<?php namespace ElasticHQ\Http\Requests;

use ElasticHQ\Http\Requests\Request;

class AddGroupFormRequest extends Request {

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
         'name' => 'required'
      ];
   }
}
