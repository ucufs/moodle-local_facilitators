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
  $('#' + source).clone().find("input").val("").end().appendTo('#' + destiny);
  drawNavigation();
}

function remove_input(destiny) {
  $('#' + destiny).children().eq(length).remove();
  drawNavigation();
}

function deleteItem(e) {
    $(e).parents(".clone_capacitacao").remove();
    drawNavigation();
}

function drawNavigation() {
  var num_elem = $(".clone_capacitacao").length;
  if (num_elem > 1) {
    $("#capacitacao li.delete").show();
  }
  else {
    $("#capacitacao li.delete").hide();
  }
}

$(function() {
    drawNavigation();
});
