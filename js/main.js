function pop_courses(){
  var role_id = function_facilitator.value;
  var url = window.location.href.split(/\d/g)[0] + edict_id.value + '/' + role_id;
  window.location = url;
}

function checkCPF(strCPF) {
  var Soma;
  var Resto;
  Soma = 0;
  if (strCPF == "00000000000") return false;
    
  for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
  Resto = (Soma * 10) % 11;
  
  if ((Resto == 10) || (Resto == 11))  Resto = 0;
  if (Resto != parseInt(strCPF.substring(9, 10)) ) return false;
  
  Soma = 0;
  for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
  Resto = (Soma * 10) % 11;

  if ((Resto == 10) || (Resto == 11))  Resto = 0;
  if (Resto != parseInt(strCPF.substring(10, 11) ) ) return false;
  return true;
}

function validaCPF(obj){
  var strCPF = obj.value.replace(/\./g,'').replace('-', '');
  if (!checkCPF(strCPF)){
    showError(obj.id, 'CPF inválido');
    return false;
  } else
    removeError(obj.id, 'CPF válido');
}

function showError(id, msg){
  elem = $('#'.concat(id));
  elem.prev().attr('title', msg);
  elem.prev().removeClass('text-success');
  elem.prev().addClass('text-error');
  if ($('#icon_error').length == 0){
    $(' <i class="fa fa-exclamation-triangle" id="icon_error" aria-hidden="true"></i>').appendTo(elem.prev());
  }
}

function removeError(id, msg){
  elem = $('#'.concat(id));
  elem.prev().removeClass('text-error');
  elem.prev().addClass('text-success');
  elem.prev().attr('title', msg);
  elem.prev().children().remove();
}

$(function (){
  $('[data-toggle="tooltip"]').tooltip();
});

document.onreadystatechange = function () {
  var function_facilitator = document.getElementById('function_facilitator');
  var edict_id = document.getElementById('edict_id');
};

$(document).ready(function() {
  $('.filer_input').filer();       
});

function add_input(source, destiny){
  clone = $('#' + source).clone().find("input").val("").end();  
  cloneCount = $('#' + source + ' .filer_input').length + 1;
  
  new_id = "group_" + cloneCount + '_' + source;
  clone.find('#group_1_' + source).attr('id', new_id).end();
  clone.find("input[type=file]").attr('id', cloneCount).end().appendTo('#' + destiny);
  $('#' + new_id).find("input[type=file]").parent().detach();
  
  new_input = '<input type="file" class="span12 filer_input" name="document[]" id="' + new_id +
   '" data-jfiler-limit="1" data-jfiler-extensions="pdf,jpg,jpeg,png" data-jfiler-maxSize="5" required>';
  
  $('#' + new_id).append(new_input);
  $('#' + new_id + '.filer_input').filer();
  $('[data-toggle="tooltip"]').tooltip();
  drawNavigation();
}

// function remove_input(destiny) {
//   $('#' + destiny).children().eq(length).remove();
//   drawNavigation();
// }

function deleteItem(e, class_name) {
  $(e).parents("." + class_name).remove();
  drawNavigation();
}

function drawNavigation() {
  var num_elem = $(".clone_capacitacao").length;
  if (num_elem > 1) {
    $("#nova_capacitacao li.delete").show();
  }
  else {
    $("#capacitacao li.delete").hide();
  }
  var num_exp = $(".clone_exp_prof").length;
  if (num_exp > 1) {
    $("#nova_exp_prof li.delete").show();
  }
  else {
    $("#exp_prof li.delete").hide();
  }
}

$(function() {
  drawNavigation();
});
