@extends('layout.index')
@section('content')
    <div class="contact-wrap">
        <div class="container">
            <div style="margin: 15px">
                <div class="row">
                    <div class="col-md-7">
                        <div class="contact-left">
                            <div class="contact-title">
                                <h3>Liên hệ</h3>
                            </div>
                            <div class="contact-form">
                                <form id="contact-form" action="/index.php/en/contact-us" method="post"
                                      class="form-validate form-horizontal">
                                    <fieldset>
                                        <legend>Send an Email. All fields with an asterisk (*) are required.
                                        </legend>
                                        <div class="form-group">
                                            <div class="col-sm-6 contact-name">
                                                <label id="jform_contact_name-lbl" for="jform_contact_name"
                                                       class="hasPopover required control-label" title=""
                                                       data-content="Your name." data-original-title="Name">
                                                    Name<span class="star">&nbsp;*</span></label>
                                                <input type="text" name="jform[contact_name]"
                                                       id="jform_contact_name" value=""
                                                       class="required form-control" size="30"
                                                       required="required" aria-required="true">
                                            </div>
                                            <div class="col-sm-6 contact-email">
                                                <label id="jform_contact_email-lbl" for="jform_contact_email"
                                                       class="hasPopover required control-label" title=""
                                                       data-content="Email Address for contact."
                                                       data-original-title="Email">
                                                    Email<span class="star">&nbsp;*</span></label>
                                                <input type="email" name="jform[contact_email]"
                                                       class="validate-email required form-control"
                                                       id="jform_contact_email" value="" size="30"
                                                       autocomplete="email" required="required"
                                                       aria-required="true"></div>

                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <label id="jform_contact_emailmsg-lbl"
                                                       for="jform_contact_emailmsg"
                                                       class="hasPopover required control-label" title=""
                                                       data-content="Enter the subject of your message here."
                                                       data-original-title="Subject">
                                                    Subject<span class="star">&nbsp;*</span></label>
                                                <input type="text" name="jform[contact_subject]"
                                                       id="jform_contact_emailmsg" value=""
                                                       class="required form-control" size="60"
                                                       required="required" aria-required="true">
                                            </div>
                                        </div>
                                        <div class="form-group contact-mes">
                                            <div class="col-sm-12">
                                                <label id="jform_contact_message-lbl"
                                                       for="jform_contact_message"
                                                       class="hasPopover required control-label" title=""
                                                       data-content="Enter your message here."
                                                       data-original-title="Message">
                                                    Message<span class="star">&nbsp;*</span></label>
                                                <textarea name="jform[contact_message]"
                                                          id="jform_contact_message" cols="50" rows="10"
                                                          class="required form-control" required="required"
                                                          aria-required="true"></textarea></div>
                                        </div>
                                        <div class="form-group contact-cap">
                                            <div class="col-sm-12 ">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-7">
                                                <div class="checkbox">
                                                    <input type="checkbox" name="jform[contact_email_copy]"
                                                           id="jform_contact_email_copy" value="1"> <label
                                                            id="jform_contact_email_copy-lbl"
                                                            for="jform_contact_email_copy" class="hasPopover"
                                                            title=""
                                                            data-content="Sends a copy of the message to the address you have supplied."
                                                            data-original-title="Send a copy to yourself">
                                                        Send a copy to yourself</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-5 control-btn">
                                                <button class="btn btn-primary validate" type="submit">Send
                                                    Email
                                                </button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="inner">

                            <div class="contact-box box-bg">
                                <!-- Show Contact name -->
                                <h3>
                                    Infomations </h3>
                                <!-- End Show Contact name -->

                                <!-- Contact other information -->
                                <div class="contact-miscinfo">
                                    <dl class="dl-horizontal">
                                        <dt>
								<span class="jicons-icons">
									<img src="/media/contacts/images/con_info.png" alt="Miscellaneous Information: ">								</span>
                                        </dt>
                                        <dd>
								<span class="contact-misc">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmosicing elit, sed do sicing elite</p>
<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.</p>
								</span>
                                        </dd>
                                    </dl>
                                </div>
                                <!-- End other information -->
                            </div>

                            <!-- Contact images -->
                            <!-- End Contact images -->

                            <div class="contact-box">
                                <!-- Contact -->
                                <div class="contact-title"><h3>Contact</h3></div>

                                <div class="contact-body">

                                    <dl class="contact-address dl-horizontal" itemprop="address"
                                        itemscope="" itemtype="http://schema.org/PostalAddress">
                                        <dt>
				<span class="jicons-icons">
					<img src="/media/contacts/images/con_address.png" alt="Address: ">				</span>
                                        </dt>


                                        <dd>
				<span class="contact-suburb" itemprop="addressLocality">
					<i class="fa fa-location-arrow"></i>12 consectetur, Adipiscing, Elit<br>				</span>
                                        </dd>
                                        <dd>
			<span class="contact-country" itemprop="addressCountry">
				<i class="fa fa-building-o"></i>New York Office<br>			</span>
                                        </dd>


                                        <dt>
		<span class="jicons-icons">
			<img src="/media/contacts/images/con_tel.png" alt="Phone: ">		</span>
                                        </dt>
                                        <dd>
		<span class="contact-telephone" itemprop="telephone">
			<i class="fa fa-phone"></i>864-770-1299		</span>
                                        </dd>
                                        <dt>
		<span class="jicons-icons">
		</span>
                                        </dt>
                                        <dd>
		<span class="contact-webpage">
			<i class="fa fa-globe"></i><a href="http://www.joomlart.com" target="_blank" itemprop="url">
			http://www.joomlart.com</a>
		</span>
                                        </dd>
                                    </dl>

                                </div>
                                <!-- End contact-->
                            </div>

                            <div class="contact-box">
                                <!-- Contact links -->
                                <div class="contact-title">
                                    <h3>Links</h3></div>

                                <div class="contact-links  contact-body">
                                    <ul class="nav nav-stacked">
                                        <li class="twitter">
                                            <a href="http://twitter.com/joomla">
                                                <i class="icon-twitter"></i>
                                                <span>Twitter</span>
                                            </a>
                                        </li>
                                        <li class="youtube">
                                            <a href="http://www.youtube.com/user/joomla">
                                                <i class="icon-youtube"></i>
                                                <span>YouTube</span>
                                            </a>
                                        </li>
                                        <li class="facebook">
                                            <a href="http://www.facebook.com/joomla">
                                                <i class="icon-facebook"></i>
                                                <span>Facebook</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- End contact Links -->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="clear: both;"></div>
@endsection
