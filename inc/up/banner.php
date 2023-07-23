<?php
  if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if(isset($_GET['rid'])){
       $id = $mysqli->real_escape_string($_GET['rid']);    
       $sql = "SELECT * FROM buy_ads WHERE pid = '$id'";
       $res = executeQueryV2($sql, $mysqli);
       //print_r($res);
    }
 }
?>
<div class="listings promoted banner-drop">
   <div class="container containerless">
      <div class="container">
         <div class="promoted-header">
            <div>
               <h2>Banner</h2>
               <p>Drop or click the white box to upload .gif file here </p>
            </div>
            <div>               
            </div>
         </div>
      </div>
      <div class="container ">
         <div class="row">
            <div class="col-md-12">
               <div class="card card-default">
                  <div class="card-header">
                     
                  </div>
                  <div class="card-body">
                     <div id="actions" class="row">
                        <div class="col-lg-6">
                           <div class="btn-group w-100">
                              <span class="button is-primary fileinput-button-banner">
                                <i class="fas fa-plus"></i>
                                <span>Add files</span>
                              </span>
                              <button type="submit" class=" button is-success start-banner is-hidden">
                              <i class="fas fa-upload"></i>
                              <span>Start upload</span>
                              </button>
                              <button type="reset" class=" button is-danger cancel is-hidden">
                              <i class="fas fa-times-circle"></i>
                              <span>Cancel upload</span>
                              </button>
                           </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center">
                           <div class="fileupload-process w-100">
                              <div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                 <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="table table-striped files" id="previews-banner" style="background-color: white;">
                        <div id="template-banner" class="row mt-2">
                           <div class="col-auto">
                              <span class="preview"><img src="data:," alt data-dz-thumbnail /></span>
                           </div>
                           <div class="col d-flex align-items-center">
                              <p class="mb-0">
                                 <span class="lead" data-dz-name></span>
                                 (<span data-dz-size></span>)
                              </p>
                              <strong class="error text-danger" data-dz-errormessage></strong>
                           </div>
                           <div class="col-4 d-flex align-items-center">
                              <div class="progress progress-striped active w-100" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                 <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                              </div>
                           </div>
                           <div class="col-auto d-flex align-items-center">
                              <div class="btn-group">
                                 <button class="button is-primary start-banner">
                                 <i class="fas fa-upload"></i>
                                 <span>Start</span>
                                 </button>
                                 <button data-dz-remove class="button is-warning cancel">
                                 <i class="fas fa-times-circle"></i>
                                 <span>Cancel</span>
                                 </button>
                                 <button data-dz-remove class="button is-danger delete is-hidden">
                                 <i class="fas fa-trash"></i>
                                 <span>Delete</span>
                                 </button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>                  
               </div>
            </div>
         </div>
      </div>
      <div class="scrollable">
         <div class="can-scroll has-text-right is-hidden-tablet">
            <img src="/assets/img/table-move.svg" alt="">
         </div>
         <style>
            .accform{
            padding-left: 30px;
            padding-right: 30px;
            padding-bottom: 20px;
            }
         </style>
         <!-- main -->
         <!-- main -->
      </div>
   </div>
</div>
<script>
   // DropzoneJS Demo Code Start
   Dropzone.autoDiscover = false
   
   // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
   var previewNode = document.querySelector("#template-banner")
   previewNode.id = ""
   var previewTemplate = previewNode.parentNode.innerHTML
   previewNode.parentNode.removeChild(previewNode)
   
   var myDropzonebanner = new Dropzone(".banner-drop", { // Make the whole body a dropzone
        url: "/upload/banner.php", // Set the url
        acceptedFiles: 'image/gif',
        maxFiles: 1,
        thumbnailWidth: null,
        //thumbnailHeight: 80,
        //parallelUploads: 20,
        previewTemplate: previewTemplate,
        autoQueue: false, // Make sure the files aren't queued until manually added
        previewsContainer: "#previews-banner", // Define the container to display the previews
        clickable: ".fileinput-button-banner", // Define the element that should be used as click trigger to select files.
        renameFile: function(file) {
            // Get the desired filename from the hidden input field
            //console.log(myDropzonebanner.getQueuedFiles().length)
            return "<?php if(isset($res)){ if(!empty($res)){ echo $res[0]['pid']; } } ?>.gif";
        }
   })
   
   myDropzonebanner.on("addedfile", function(file) {
   // Hookup the start button
   file.previewElement.querySelector(".start-banner").onclick = function() { myDropzonebanner.enqueueFile(file) }
   })
   
   // Update the total progress bar
   myDropzonebanner.on("totaluploadprogress", function(progress) {
   document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
   })
   
   myDropzonebanner.on("sending", function(file) {
   // Show the total progress bar when upload starts
   document.querySelector("#total-progress").style.opacity = "1"
   // And disable the start button
   file.previewElement.querySelector(".start-banner").setAttribute("disabled", "disabled")

   })
   
   // Hide the total progress bar when nothing's uploading anymore
   myDropzonebanner.on("queuecomplete", function(progress) {
   document.querySelector("#total-progress").style.opacity = "0"
   })
   
   // Setup the buttons for all transfers
   // The "add files" button doesn't need to be setup because the config
   // `clickable` has already been specified.
   document.querySelector("#actions .start-banner").onclick = function() {
   myDropzonebanner.enqueueFiles(myDropzonebanner.getFilesWithStatus(Dropzone.ADDED))
   }
   document.querySelector("#actions .cancel").onclick = function() {
   myDropzonebanner.removeAllFiles(true)
   }
   // DropzoneJS Demo Code End
</script>