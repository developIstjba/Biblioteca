/**
 * Author:  Jonathan
 * Created: 23 jul 2023
 */


/*
 * Object serialize inputs, textarea, others.
 * @form = formularios  
 */
var form = {
    
    data: function(frm){
        var inputs = frm.serializeArray();
        var data = {};
        var list = [];
        let key, result;
        
        $.map(inputs, function(n, i){
            if(!data.hasOwnProperty(n['name'])){
                data[n['name']] = n['value'];
                result = n['value'];
                list = [];
            }else{
                
                if(!list.includes(result)){
                    list.push(result);
                }
                list.push(n['value']);
                data[n['name']] = list;

            }
            
        });
        return data;
    },
    clear: function(frm){
        var inputs = frm.serializeArray();
        $.map(inputs, function(n, i){
            if(n['name'] !== 'token'){
                $("[name='"+n['name']+"']").val('');
            }
            
        });    
    },
    selected: function(frm){
        var inputs = frm.serializeArray();
        var data = [];
        
        $.map(inputs, function(n, i){
            
            data.push(n['value']);
        });
        return data;        
        
    }
    
};


/*
 * Convertir objeto a Lista
 * @type object{} parse to Array[]
 */
var objectParseArray = function(obj){
    
    var objArray = [];
        $.map(obj, function(n, i){
            
            objArray.push(n);
        });
    
    return objArray;
    
};


/*
 * Limpiar y llenar formMessage
 * @id = elem DOM, @message = mensaje de error
 */
var formMessage = {
  
    clear: function(id){
        
        $('#'+id).text('');
        $('#'+id).addClass('hidden');      
        $('#'+id).addClass('msg-danger');
    },  
    error: function(id, message){
        $('#'+id).text(message);
        $('#'+id).removeClass('hidden');
    },
    success: function(id, message){
        $('#'+id).text(message);
        $('#'+id).removeClass('hidden');
        $('#'+id).removeClass('msg-danger');
        $('#'+id).addClass('msg-primary');
        
    }
    
};


/*
 * Ajax
 * @data = objeto, @url = url, @funSuccess = function success, @funError = function error, @idHtml = id DOM response
 */
var ajx = {
    
    validate : function(data, url, idHtml){
        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            dataType: 'json',
            cache: false,
            beforeSend: function(){
                formMessage.clear(idHtml);
                
            }
        }).done(function(response){

                squareLoader.load().then(()=>{
                    if(response.type === 'success'){
                        
                        if(response.code === 600){
                            redirectTo(response.route);
                        }else{
                            formMessage.success(idHtml, response.message);
                        }
                    }else{
                        
                        formMessage.error(idHtml, response.message);
                    }
                }).catch(()=>{
                    formMessage.error(idHtml, 'Se ha producido un error inesperado.');
                });

        }).fail(function(){            
            redirectTo('error/e404');
        });
        
    },
    update : function(data, url, idForm){
        
        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            dataType: 'json',
            cache: false
        }).done(function(response){
            
            if(response.type === 'success'){
                alert.success(response.message);  
                if(idForm !== null){
                    form.clear(idForm);
                }
                
            }else{
                alert.error(response.message);
            }

        }).fail(function(){            
            alert.error('Se ha producido un error inesperado.');
        });
        
    },
    select : function(data, url){
        
        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            dataType: 'json',
            cache: false
        }).done(function(response){
            
            if(response.type === 'success' && response.code === 600){
                redirectTo(response.route);          
                
            }else{
                alert.error(response.message);
            }

        }).fail(function(){            
            alert.error('Se ha producido un error inesperado.');
        });
        
    },
    delete : function(data, url, datatable, fila){
        
        const swalWithStyleButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn-primary',
              cancelButton: 'btn-danger mrg-left-xsm'
            },
            buttonsStyling: false
        });

        const swalConfirmStyleButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn-primary'
            },
            buttonsStyling: false
        });

        swalWithStyleButtons.fire({
            title: 'Desea eliminar el registro?',
            text: "No podrás revertir esto.!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si, borrar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    dataType: 'json',
                    cache: false
                }).done(function(response){

                    if(response.type === 'success'){ 
                        alert.success(response.message); 
                        datatable.row(fila.parents('tr')).remove().draw();

                    }else{
                        alert.error(response.message);
                    }

                }).fail(function(){            
                    alert.error('Se ha producido un error inesperado.');
                });                
                
            }
        });
        
    },
    change : function(data, url, fila, clasName){
        
        var btnMsg = "";
        var titleSwal = "";
        var datarol = fila.data('btn-rol');
        
        if(datarol === 'disable'){
            titleSwal = "Desea desactivar el registro?";
            btnMsg = "Si, Desactivar!";
        }else if(datarol === 'enable'){
            btnMsg = "Si, Activar!";
            titleSwal = "Desea activar el registro?";
        }
        
        const swalWithStyleButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn-primary',
              cancelButton: 'btn-danger mrg-left-xsm'
            },
            buttonsStyling: false
        });

        const swalConfirmStyleButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn-primary'
            },
            buttonsStyling: false
        });

        swalWithStyleButtons.fire({
            title: titleSwal,
            text: "Está acción cambiará el estado del registro.",
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: btnMsg,
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    dataType: 'json',
                    cache: false
                }).done(function(response){

                    if(response.type === 'success'){ 

                        if(datarol === 'disable'){
                            fila.parents('td').find('.btn-enable-'+clasName).removeClass("hidden");
                            fila.addClass("hidden");                          
                        }else if(datarol === 'enable'){
                            fila.parents('td').find('.btn-disable-'+clasName).removeClass("hidden");
                            fila.addClass("hidden");                           
                        }
                        
                        alert.success(response.message);

                    }else{
                        alert.error(response.message);
                    }

                }).fail(function(){            
                    alert.error('Se ha producido un error inesperado.');
                });                
                
            }
        });
        
    },
    upload : function(data, url, idForm){
        
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: data,
            contentType: false,
            processData: false
        }).done(function(response){
            
            if(response.type === 'success'){
                alert.success(response.message);  
                if(idForm !== null){
                    form.clear(idForm);
                }
                
            }else{
                alert.error(response.message);
            }

        }).fail(function(){            
            alert.error('Se ha producido un error inesperado.');
        });
        
    },
    approve : function(data, url, datatable, fila){
        
        const swalWithStyleButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn-primary',
              cancelButton: 'btn-danger mrg-left-xsm'
            },
            buttonsStyling: false
        });

        const swalConfirmStyleButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn-primary'
            },
            buttonsStyling: false
        });

        swalWithStyleButtons.fire({
            title: 'Desea aprobar la solicitud?',
            text: "No podrás revertir esta acción!",
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'Aprobar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    dataType: 'json',
                    cache: false
                }).done(function(response){

                    if(response.type === 'success'){ 
                        alert.success(response.message); 
                        datatable.row(fila.parents('tr')).remove().draw();

                    }else{
                        alert.error(response.message);
                    }

                }).fail(function(){            
                    alert.error('Se ha producido un error inesperado.');
                });                
                
            }
        });
        
    },
    
};


/*
 * 
 * @param {type} url
 * @return {undefined}
 */
var redirectTo = function(url){
    
    window.location.replace('/'+url);   
};


/*
 * 
 * @param {type} id table
 * @return {DataTable}
 */
var dataTables = function(id){
    
    return new DataTable('#'+id, {
                language: {
                    url: '//biblioteca.local/public/DataTables/languaje-es-Es.json',
                },
                responsive: true,
                columnDefs: [
                    { responsivePriority: 1, targets: 0 },
                    { responsivePriority: 2, targets: -1 }
                ],
                dom: 'frtip',
        /*
                dom: 'Bfrtip',
                buttons: [
                    { 
                        extend: 'copy',
                        text: "<i class='icon icon-file_copy'></i> Copiar",
                        titleAttr: "Copiar",
                        className: 'btn-copy-text' },
                  
                    { 
                        extend: 'excel',
                        text: "<i class='icon icon-insert_drive_file'></i> Excel",
                        titleAttr: "Exportar a Excel",
                        className: 'btn-export-excel' },
                    { 
                        extend: 'pdf', 
                        text: "<i class='icon icon-insert_drive_file'></i> PDF",
                        titleAttr: "Exportar a PDF",                        
                        className: 'btn-export-pdf' 
                    }
                ]
        */
            }); 
    
    
};
   

/*
 * 
 * @param {type} id table
 * @return {DataTable}
 */
var searchTables = function(id){
    
    return new DataTable('#'+id, {
                language: {
                    url: '//biblioteca.local/public/DataTables/languaje-es-Es.json',
                },
                responsive: true,
                dom: 'frtp'
            }); 

};


/*
 * 
 * @param {type} id table
 * @return {DataTable}
 */
var simpleTables = function(id){
    
    return new DataTable('#'+id, {
                language: {
                    url: '//biblioteca.local/public/DataTables/languaje-es-Es.json',
                },
                responsive: true,
                dom: 'rt'           
            }); 
    
};


/*
 * 
 * @param {type} datatable object
 * @param {type} data {key:value}
 * @return {add row table}
 */
var addRowsTable = function(datatable, data){  
    datatable.row.add(objectParseArray(data)).draw();
    
};


/*
 * 
 * @param {type} datatable object
 * @param {type} fila
 * @return {undefined}
 */
var deleteRowsTable = function(datatable, fila){  
    
    datatable.row(fila.parents('tr')).remove().draw();
};


/*
 * Swal
 * @message = message error or success
 */
var alert = {

    success: function(message){

        const swalWithStyleButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn-primary'
            },
            buttonsStyling: false
        });

        swalWithStyleButtons.fire({
            icon: 'success',
            title: 'Correcto!',
            text: message
        });
        
    },    
    error: function(message){

        const swalWithStyleButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn-danger'
            },
            buttonsStyling: false
        });
        
        swalWithStyleButtons.fire({
            icon: 'error',
            title: 'Error!',
            text: message
        });
    }   
    
};


/*
 * 
 * @param {type} id div content
 * @param {type} id btnSuccess
 * @return {unresolved}
 */
var wizard = function(id, btnSuccess){
    
    return $('#'+id).smartWizard({
        selected: 0,
        theme: 'arrows',
        justified: true,
        autoAdjustHeight: false,
        backButtonSupport: true,
        enableUrlHash: false,     
        toolbar:{
            position: 'bottom',
            showNextButton: true,
            showPreviousButton: true,
            extraHtml: '<button class="btn-primary sw-btn" id="'+btnSuccess+'">Guardar</button>'
        },
        anchor: {
            enableNavigation: true, 
            enableNavigationAlways: false, 
            enableDoneState: true, 
            markPreviousStepsAsDone: true, 
            unDoneOnBackNavigation: false, 
            enableDoneStateNavigation: true 
        },        
        keyboard: {
            keyNavigation: false,
            keyLeft: [37],
            keyRight: [39] 
        },        
        lang: { // Language variables for button
            next: 'Siguiente',
            previous: 'Anterior'
        },        
    });
        
};


var simpleWizard = function(id){
    
    return $('#'+id).smartWizard({
        selected: 0,
        theme: 'arrows',
        justified: true,
        autoAdjustHeight: false,
        backButtonSupport: true,
        enableUrlHash: false,     
        toolbar:{
            position: 'bottom',
            showNextButton: true,
            showPreviousButton: true
        },
        anchor: {
            enableNavigation: true, 
            enableNavigationAlways: false, 
            enableDoneState: true, 
            markPreviousStepsAsDone: true, 
            unDoneOnBackNavigation: false, 
            enableDoneStateNavigation: true 
        },        
        keyboard: {
            keyNavigation: false,
            keyLeft: [37],
            keyRight: [39] 
        },        
        lang: { // Language variables for button
            next: 'Siguiente',
            previous: 'Anterior'
        },        
    });
        
};


/*
 * Datepicker
 */
var datepick = function(){
    
    return $('[data-toggle="datepicker"]').datepicker({
        format: 'yyyy-mm-dd',
        language: 'es-ES',
        autoHide: true
    });

};



var toogleButton = function(datarol, elem, clasName) {
    if(datarol === 'disable'){
        elem.parents('td').find('.'+clasName).removeClass("hidden");
        elem.addClass("hidden");                          
    }else if(datarol === 'enable'){
        elem.parents('td').find('.'+clasName).removeClass("hidden");
        elem.addClass("hidden");                           
    }    
};