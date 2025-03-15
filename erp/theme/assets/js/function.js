//---- local
//var base_url='http://localhost/stylish_arc/erp/';
//------- server
var base_url='http://erp.stylisharc.com/';

var loading_img= base_url+"theme/assets/images/loading.gif";
function get_subcat(idresult,value,fn)
{
    $.ajax({
        type:'GET',
        url:base_url+'index.php?action='+fn+'&query=get_subcat&id='+value,
        success:function(result){
            $('#'+idresult).html(result);
        }
    });
}

function show_page_model(title,page)
{
  $('#exampleModalLabel').html(title);  
  $('#modal-body').html('<img src='+loading_img+'>');
  $('#modal-body').load(page); 
}

function ajax_search(id,url)
{
    alert(id);
    //--- call on keyup
    var query = $('#'+id).val();  
        if(query != '')  
        {  
             $.ajax({  
                  url:base_url+"index.php?"+url,  
                  method:"POST",  
                  data:{query:query},  
                  success:function(data)  
                  {  
                       $('#'+id).fadeIn();  
                       $('#'+id).html(data);  
                  }  
             });  
        }  
   
   $(document).on('click', 'li', function(){  
        $('#'+id).val($(this).text());  
        $('#'+id).fadeOut();  
   });
}


function deleteme(h,i,j)
{
  var r = confirm("Are you sure you want to delete  ??");
  if (r == true) 
  {
     $.ajax({
           type: "GET",
           url: base_url+'index.php?action='+h+'&query='+i+'&id='+j,
           success: function(data)
           {
              $('#'+j).hide(500);
           }
       }); 
  } 
}

//== this will hide the form and show a msg only
function form_submit(x) 
{
 
 //alert(x);
 var form = $("#"+x);
 //alert(form.serialize);
        $('#msg'+x).html("Please Wait !");
        form.hide();
        $.ajax({
           type: "POST",
           url: $("#"+x).attr("action"),
           data: form.serialize(),
           success: function(result)
           {
               $('#msg'+x).html(result);  
                form.reset();
           }
        });  
 } 

 function form_submit_result(x) 
{
 
 //alert(x);
 var form = $("#"+x);
 //alert(form.serialize);
        $('#msg'+x).html("Please Wait !");
       
        $.ajax({
           type: "POST",
           url: $("#"+x).attr("action"),
           data: form.serialize(),
           success: function(result)
           {
            
               $('#msg'+x).html(result);  
            
           }
        });  
 } 

 function calc_total(id)
 {
     var qty=$('#qty'+id).val();
     var fob=$('#price_fob'+id).val();
     var total=parseInt(qty)*parseFloat(fob);
     $('#usd'+id).val(total);
 }


 function divload(url,id)
 {
    $('#'+id).html('<img src='+loading+'>');
    $('#'+id).html(url);
 }



 function fnExcelReport(tableID,filename) {
  
  var tab_text = '<html xmlns:x="urn:schemas-microsoft-com:office:excel">';
  tab_text = tab_text + '<head><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet>';
  tab_text = tab_text + '<x:Name>Test Sheet</x:Name>';
  tab_text = tab_text + '<x:WorksheetOptions><x:Panes></x:Panes></x:WorksheetOptions></x:ExcelWorksheet>';
  tab_text = tab_text + '</x:ExcelWorksheets></x:ExcelWorkbook></xml></head><body>';
  tab_text = tab_text + "<table border='1px'>";

  // Remove Dynamic hidden controls.
  var list = $('#'+tableID).find('.ng-hide');
  for (var i = list.length - 1; 0 <= i; i--) {
      if (list[i] && list[i].parentElement) {
          list[i].parentElement.removeChild(list[i]);
      }
  }

  // Getting dynamic controll values.
  var list = $('#'+tableID).find('.dvItems');
  var values = "";
  for (var i = 0; i <= list.length - 1; i++) {
      if (list[i] && list[i].parentElement) {
          values += $(list[i]).text().trim();
      }
  }
  for (var i = 0; i <= list.length - 1; i++) {
      if (i == 0) {
          // Replace last comma and assign value.
          $($('#'+tableID).find('.dvItems')[i]).text(values.replace(/,\s*$/, ""));
      }
      else {
          $($('#'+tableID).find('.dvItems')[i]).text("");
      }
  }
  tab_text = tab_text + $('#'+tableID).html();
  tab_text = tab_text + '</table></body></html>';
  var data_type = 'data:application/vnd.ms-excel';
  var ua = window.navigator.userAgent;
  var msie = ua.indexOf("MSIE ");

  if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
      if (window.navigator.msSaveBlob) {
          var blob = new Blob([tab_text], {
              type: "application/vnd.ms-excel;charset=utf-8;"
          });
          navigator.msSaveBlob(blob, 'filname.xls');
      }
  } else {
      window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));
  }
  
}




      function htmlget(id,filename)
      {
          var html = $("#"+id).html();
          //alert(html);
          var final_html = "<hr><form name='pdf' id='htmlpdf' target='_blank' action='"+base_url+"library/dompdf/test.php' method='post'><input type='hidden' id='myhtml' name='html'><select name='page'><option disabled='disbaled' selected='selected'>--Page--</option><option>letter</option><option>A2</option><option>A3</option><option>A4</option></select><select name='orientation'><option disabled='disbaled' selected='selected'>--Type--</option><option value='landscape'>Landscape</option><option value='portrait'>Portrait</option></select><input type='hidden' name='filename' value='"+filename+"'><input type='submit' name='submit' value='Generate PDF'></form>";
          $("#editor").html(final_html);
          $("#myhtml").val(html);
          

      }

      function cbm()
      {
        var height=$('#height').val();
        var width=$('#width').val();
        var length=$('#length').val();
        
        var cbm = parseInt(height)*parseInt(width)*parseInt(length);
        var final = parseInt(cbm)/1000000;

        $('#cbm').val(final);
      }

      function weight_calc()
      {
        var weight_cartoon=$('#weight_cartoon').val();
        var weight_plastic=$('#weight_plastic').val();
        var weight_wood=$('#weight_wood').val();
        var weight_iron=$('#weight_iron').val();
        
        
        var net = parseFloat(weight_iron)+parseFloat(weight_wood);

        var gross = parseFloat(weight_iron)+parseFloat(weight_wood)+parseFloat(weight_plastic)+parseFloat(weight_cartoon);

        var final_net=net.toFixed(2);
        var final_gross=gross.toFixed(2);


        $('#net_weight').val(final_net);
        $('#gross_weight').val(final_gross);
      }

      function purchase_fields(value,col_send,tblname,col_req,fieldid)
{
  var valueid = $('#'+value).val();
  alert(valueid);
                $.ajax({ 
                    url: 'index.php?action=order&query=container-managment&value='+valueid+'&tblname='+tblname+'&col_send='+col_send+'&col_req='+col_req, 
                    type: 'get', 
                    success: function(response){ 
                      var count =  $(response).length;
                      if(count > 1)
                           {$('#'+fieldid).html(''); $('#'+fieldid).append(response);}
                      else
                           {var response0 = response.trim();
                           $('#'+fieldid).val(response0);}
                        },

                });
}


function exportToExcel(tableId,filename){
//-- change base64 to image


        let tableData = document.getElementById(tableId).outerHTML;
        tableData = tableData.replace(/<A[^>]*>|<\/A>/g, ""); //remove if u want links in your table
        tableData = tableData.replace(/<input[^>]*>|<\/input>/gi, ""); //remove input params
        

        let a = document.createElement('a');
        a.href = `data:application/vnd.ms-excel, ${encodeURIComponent(tableData)}`
        a.download = filename + '.xls'
        a.click()
}


function getBase64Image(img) {
    var canvas = document.createElement("canvas");
    canvas.width = img.width;
    canvas.height = img.height;
    var ctx = canvas.getContext("2d");
    ctx.drawImage(img, 0, 0);
    var dataURL = canvas.toDataURL("image/png");
    return dataURL.replace(/^data:image\/?[A-z]*;base64,/);
  }
  

function cbm_auto(l,w,h,cbm_inputid,unit)
{
    var length= $('#'+l).val();
    var width= $('#'+w).val();
    var height= $('#'+h).val();
    var cbm = parseFloat(length)*parseFloat(width)*parseFloat(height);
    if(unit == 'inch')
    {var cbm_final = parseFloat(cbm)/61023.8; }
    else
    {var cbm_final = parseFloat(cbm)/1000000;}
    
    $('#'+cbm_inputid).val(cbm_final);  
}
    