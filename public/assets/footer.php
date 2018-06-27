<footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-3">
                    <h3>Need help?</h3>
                    <a href="tel://<?=$rowset['tel']?>" id="phone"><?=$rowset['tel']?></a>
                    <a href="#" id="email_footer"><?=$rowset['email']?></a>
                </div>
                <div class="col-md-2 col-sm-3">
                    <h3>About</h3>
                    <ul>
                        <li><a href="presentation">หมวดหมู่</a></li>
                        <li><a href="article">บทความ</a></li>
                        
                        
                         <li><a href="contact_us">ติดต่อเรา</a></li>
                    </ul>
                </div>
                <div class="col-md-2 col-sm-3">
                    <h3>Discover</h3>
                    <ul>
                        <li><a href="history">ความเป็นมาประวัติ</a></li>
                        <li><a href="directions">เส้นทางการเดินทาง</a></li>
                      
                    
                    </ul>
                    <h3>Settings</h3>
                    <div class="styled-select">
                        <select onchange="if (this.value) window.location.href=this.value" class="form-control" >
                            <option value="" selected>Language</option>
                            <option value="http://en.teeneejj.com/">English</option>
                            <option value="http://www.teeneejj.com/">Thai</option>
                            <option value="http://cn.teeneejj.com/">中文</option>
                          
                        </select>
                    </div>
                </div>
                <div class="col-md-4 col-sm-3">
                    <h3>Fanpage</h3>
                   <div class="fb-page" data-href="<?=$rowset['facebook_fanpage']?>" data-width="280" data-hide-cover="false" data-show-posts="false". data-show-facepile="false" >
                            <div class="fb-xfbml-parse-ignore"><blockquote cite="<?=$rowset['facebook_fanpage']?>">
                                <a href="<?=$rowset['facebook_fanpage']?>">Ghostza</a></blockquote></div></div>
                </div>
            </div><!-- End row -->
            <div class="row">
                <div class="col-md-12">
                    <div id="social_footer">
                        <ul>
                            <li><a href="<?=$rowset['facebook']?>"><i class="icon-facebook"></i></a></li>
                            <li><a href="<?=$rowset['twitter']?>"><i class="icon-twitter"></i></a></li>
                            <li><a href="<?=$rowset['google_plus']?>"><i class="icon-google"></i></a></li>
                            <li><a href="<?=$rowset['instagram']?>"><i class="icon-instagram"></i></a></li>
                      
                        </ul>
                        <p>© Teeneejj 2015</p>
                    </div>
                </div>
            </div><!-- End row -->
        </div><!-- End container -->
    </footer><!-- End footer -->