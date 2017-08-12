var Tareas={
    getAll:function(data,callback){
        data.per_page=data.length;
        data.page=(data.start+data.length)/data.length;
        data.filter=data.search.value;
        $("body").append('<div class="overlay"></div><div class="loading-img"></div>');
        $.get(url, data, function(response) {
            callback(response);
            $(".overlay,.loading-img").remove();
        });
    },
    get:function(id){
        axios.get(
            url+'/'+id,
            headerAxios
        )
        .then(response => {
            vm.tarea = response.data;
            vm.movimientos = response.data.movimientos;
            pintarMapa();
            //roles();
        })
        .catch(e => {
            vm.errors.push(e);
        });
    },
    /** guardar nuevo
    */
    store:function(){
        //vm.user.fecha_nacimiento =  $('input[name=fecha_nacimiento]').val();
        //vm.user.roles = $('#roles').val();

        axios.post(
            url,
            vm.tarea,
            headerAxios
        )
        .then(response => {
            reload();
            $("#modal-tarea").modal('hide');
        })
        .catch(e => {
            vm.errors.push(e);
        });
    },
    /** guardar existente
    */
    update:function(id){
        //vm.user.fecha_nacimiento =  $('input[name=fecha_nacimiento]').val();
        //vm.user.roles = $('#roles').val();
        axios.put(
            url+'/'+id,
            vm.tarea,
            headerAxios
        )
        .then(response => {
            reload();
            $("#modal-tarea").modal('hide');
        })
        .catch(e => {
            vm.errors.push(e);
        });
    },
    destroy:function(id){
        axios.delete(
            url+'/'+id,
            headerAxios
        )
        .then(response => {
            user = response;
        })
        .catch(e => {
            vm.errors.push(e);
        });
    }
};
/*
var $validator = $("#wizard-1").validate({
  
  rules: {
    email: {
      required: true,
      email: "Your email address must be in the format of name@domain.com"
    },
    fname: {
      required: true
    },
    lname: {
      required: true
    },
    country: {
      required: true
    },
    city: {
      required: true
    },
    postal: {
      required: true,
      minlength: 4
    },
    wphone: {
      required: true,
      minlength: 10
    },
    hphone: {
      required: true,
      minlength: 10
    }
  },
  
  messages: {
    fname: "Please specify your First name",
    lname: "Please specify your Last name",
    email: {
      required: "We need your email address to contact you",
      email: "Your email address must be in the format of name@domain.com"
    }
  },
  
  highlight: function (element) {
    $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
  },
  unhighlight: function (element) {
    $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
  },
  errorElement: 'span',
  errorClass: 'help-block',
  errorPlacement: function (error, element) {
    if (element.parent('.input-group').length) {
      error.insertAfter(element.parent());
    } else {
      error.insertAfter(element);
    }
  }
});

$('#bootstrap-wizard-1').bootstrapWizard({
  'tabClass': 'form-wizard',
  'onNext': function (tab, navigation, index) {
    var $valid = $("#wizard-1").valid();
    if (!$valid) {
      $validator.focusInvalid();
      return false;
    } else {
      $('#bootstrap-wizard-1').find('.form-wizard').children('li').eq(index - 1).addClass(
        'complete');
      $('#bootstrap-wizard-1').find('.form-wizard').children('li').eq(index - 1).find('.step')
      .html('<i class="fa fa-check"></i>');
    }
  }
});


// fuelux wizard
var wizard = $('.wizard').wizard();

wizard.on('finished', function (e, data) {
  //$("#fuelux-wizard").submit();
  //console.log("submitted!");
  $.smallBox({
    title: "Congratulations! Your form was submitted",
    content: "<i class='fa fa-clock-o'></i> <i>1 seconds ago...</i>",
    color: "#5F895F",
    iconSmall: "fa fa-check bounce animated",
    timeout: 4000
  });
  
});
*/