<style type="text/css">
    .spinner-area{
        font: 14px / 25px verdana;
        resize: none;
    }

    .float-right{
        text-align: -webkit-right;
    }
</style>
<!---------- content section start ---------->
<div class="rcs_content_wrapper rcs_middle_box rcs_integration_wrapper">
    <div class="rcs_content_box rcs_integration_box rcs_middle_box_inner">
        <div class="rcs_table_head">
            <h2>Content Spinner</h2>
        </div>
        <div class="rcs_integration_body">

            <div class="container mt-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-floating">
                            <label for="floatingTextarea">Spinner</label>
                            <textarea class="form-control spinner-area" style="height: 370px; width: 100%; margin-bottom: 15px;" id="floatingTextarea"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="rcs_input_field">
                        <input type="text" id="spinnerArticleContent" value="content_spinner" class="hidden">
                        <label for="langSpinner">Language<span class="rcs_required_star">*</span></label>
                        <select class="js-example-basic-single" name="langSpinner" id="langSpinner">
                            <option value="en">English</option>
                            <option value="du">Dutch</option>
                            <option value="fr">French</option>
                            <option value="sp">Spanish</option>
                            <option value="ge">Germany</option>
                            <option value="tr">Turkish</option>
                            <option value="in">Indonesian</option>
                        </select>
                    </div>
                    <div class="col-lg-6 float-right" style="margin-bottom: 30px;">
                        <button type="button" id="resetSpinner" class="rcs_btn btn-primary">Reset</button>
                        <button type="button" id="submitSpinner" class="rcs_btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!---------- content section end ---------->