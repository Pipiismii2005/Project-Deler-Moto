@extends('layout.master')
@section('abc')
<div class="contact_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <h1 class="contact_taital contact_heading">Contact Us</h1>
               </div>
            </div>
            <div class="contact_section_2">
               <div class="row">
                  <div class="col-md-12">
                     <div class="mail_section map_form_container">
                        <form action="">
                           <input type="text" class="mail_text" placeholder="Your Name" name="Your Name">
                           <input type="text" class="mail_text" placeholder="Email" name="Email">
                           <textarea class="massage-bt" placeholder="Massage" rows="5" id="comment" name="Massage"></textarea>
                           <div class="contact_btn_main">
                              <div class="send_bt active"><a href="#">Send</a></div>
                            
                           </div>
                        </form>

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
@endsection