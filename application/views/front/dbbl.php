<!-- Register Area -->
<section class="registerArea section mainSection scrollAnchor graySection" id="registerArea">
    <div class="sectionWrapper">
        <div class="container">

            <div class="row">


            </div><!-- end of row -->

            <div class="row registerAreaContents">
                <div class="col-md-2 formWrapper hidden-xs"></div>
                <div class="col-md-7 formWrapper paynow-box">
                    <h6>Make your payment in this number through any DBBL Customer Wallet<br />আপনি আপনার বিকাশ ওয়ালেট থেকে নিচের নাম্বারে টাকা পাঠান</h6>
                    <div class="paynow-box-number">01674-086-310</div>
                    <?php
                    $msg = $this->session->userdata("msg");
                    $err = $this->session->userdata("err");
                    if ($msg != NULL) {
                        echo ($err) ? "<center><p class='color-red'>{$msg}</p></center>" : "<center><p class='color-green'>{$msg}</p></center>";
                        $this->session->unset_userdata("msg");
                        $this->session->unset_userdata("err");
                    }

                    echo validation_errors('<div class="color-red"><center>', '</center></div>') . "<br />";
                    ?>
                    <form action="<?php echo base_url() ?>payment-with-dbbl" method="POST" novalidate="">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">   
                        <div class="form-group">                                             
                            <div class="row">  
                                <div class="col-sm-4 hidden-xs">
                                </div>
                                <div class="col-sm-4"> 
                                    <label class="mylabel">Enter DBBL TrxId: </label><br />
                                    <input type="text" id="num" name="num" required="" class="form-control">
                                    <br />
                                    <label class="mylabel">Amount: </label><br />
                                    <input type="text" name="amount" required="" class="form-control">
                                    <br />

                                    <br />

                                    <input type="submit" name="paynow" class="btn btn-success" value="&nbsp;&nbsp;&nbsp;Send&nbsp;&nbsp;&nbsp;" />
                                </div>   
                                <div class="col-sm-3 hidden-xs"></div>
                            </div>

                        </div>
                    </form><!-- end of registerFormArea -->
                    
                    <div class="send-money-process">
                        সেন্ড মানি করতে নিচের ধাপগুলো অনুসরণ করুন-<br />

                    ১। *২৪৭# ডায়াল করে বিকাশ মোবাইল মেন্যুতে যান<br />

                    ২। “সেন্ড মানি” সিলেক্ট করুন<br />

                    ৩। আপনি যে বিকাশ একাউন্টে টাকা পাঠাতে চান সেই একাউন্ট নাম্বারটি লিখুন<br />

                    ৪। আপনি যে পরিমাণ টাকা পাঠাতে চান সেই পরিমাণ টি লিখুন<br />

                    ৫। লেনদেনের একটি রেফারেন্স/তথ্যসূত্র দিন (একটি শব্দের বেশি ব্যবহার করবেন না, স্পেস এবং বিশেষ অক্ষর এর ব্যবহার এড়িয়ে চলুন)<br />

                    ৬। আপনার বিকাশ মোবাইল মেন্যু পিনটি দিয়ে লেনদেনটি সম্পন্ন করুন<br />

                    আপনি এবং প্রাপক দুজনই বিকাশ থেকে কনফার্মেশন মেসেজ পাবেন।
                    </div>
                </div><!-- end of col-md-12 -->
                <div class="col-md-3 formWrapper hidden-xs"></div>
            </div><!-- end of registerAreaContents -->

        </div><!-- end of container -->
    </div><!-- end of section wrapper -->
</section><!-- end Register Area section --> 