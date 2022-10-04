<div class="modal fade advisory-listing-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Add Advisory Listing</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" id="advisory-listing" onsubmit="return false;">
                    <div class="modal-body">
                        <div class="container">
                            <input type="hidden" name="id" id="id" value="" />
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <label>Advisory Type<span class="text-danger">*</span></label>
                                    <select class="form-control" name="type" id="type" required>
                                        <option value="" selected>Select Advisory Type</option>
                                        <option value="Product Advisory">Product Advisory</option>
                                        <option value="Service Advisory">Service Advisory</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Category<span class="text-danger">*</span></label>
                                    <select class="form-control" name="category" id="category" required>
                                        <option value="" selected>Select Category</option>
                                        <option value="Product Category">Product Category</option>
                                        <option value="Service Category">Service Category</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <label>Give any suitable name for this listing<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="listing_name" id="listing_name" value="" required placeholder="Enter Product Name/Service Name" />
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Duration</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="number" class="form-control" name="duration_in_hours" id="duration_in_hours" value="" placeholder="In Hours" />
                                        </div>
                                        <div class="col-md-6">
                                            <input type="number" class="form-control" name="duration_in_minutes" id="duration_in_minutes" value="" placeholder="In Minutes" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <label>Fees<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="fees" id="fees" required value="" placeholder="Fees" />
                                </div>
                                <div class="col-md-6">
                                    <label>Upload Picture<span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" name="image" required />
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <label>Explain in details about this listing or problem for which you are able to advise.</label>
                                    <textarea class="form-control" name="about_listing" id="about_listing" placeholder="Please write in details about the issue for which u are able to advise for the selected subject matter"></textarea>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <label>Write about your experiences and how your advice is beneficial for others?</label>
                                    <textarea class="form-control" name="experience" id="experience" placeholder="Write about how your advise is beneficial for others"></textarea>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Please select your mode to provide the solutions</label>
                                        </div>
                                        <div class="col-md-6"><input type="checkbox" class="mode" name="mode[]" value="Voice call" /> On Voice Call</div>
                                        <div class="col-md-6"><input type="checkbox" class="mode" name="mode[]" value="Video call" /> On Video Call</div>
                                        <div class="col-md-6"><input type="checkbox" class="mode" name="mode[]" value="Any Desk" /> On Any Desk</div>
                                        <div class="col-md-6"><input type="checkbox" class="mode" name="mode[]" value="Team Viewer" /> On Team Viewer</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Period of experience</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="number" class="form-control" name="exp_in_years" id="exp_in_years" value="" placeholder="In Years" />
                                        </div>
                                        <div class="col-md-6">
                                            <input type="number" class="form-control" name="exp_in_months" id="exp_in_months" value="" placeholder="In Month" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn theme-bg" id="saveBtn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
