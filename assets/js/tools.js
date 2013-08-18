/**
 * Created with JetBrains PhpStorm.
 * User: Exiri
 * Date: 17.08.13
 * Time: 9:10
 * To change this template use File | Settings | File Templates.
 */

var tools = {
  delete: function(id){
      $.ajax({
          url: '/ajax.php',
          type: 'POST',
          dataType: 'JSON',
          data: {id: id},
          error: function(data){
          },
          success: function(data){
          }
      });
      $('#branch'+id).html('');
  }
};

$(function(){
});