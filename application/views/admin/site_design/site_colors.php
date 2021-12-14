<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Site Build</a></li>
                        <li class="breadcrumb-item"><a href="#">Site Design</a></li>
                        <li class="breadcrumb-item active">Site Colors</li>
                    </ol>
                </div>
                <h4 class="page-title">Site Design - Site Colors</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
  <!--START PAGE CONTENT HERE-->
  <div class="row">
    <div class="col-10">
      <div class="card">
        <div class="card-body">
            <h4 class="header-title">
              Customize Your Site
            </h4>
            <p class="text-muted font-14">
              Choose one color from each column below to choose the colors for your site's links, active links and visited links. You may also choose the site's body text font and Headline fonts. To save your choices and make them live online, hit the Publish button below. If you'd like to save these choices as a draft, hit the Save Draft button. If you do not make changes here, your original site's colors will be used.
            </p>
            <p></p>
            <form action="/admin/site_design_save" method="POST" id="frmsitecolors">
            <div class="table-responsive">
              <table class="table mb-0">
                <thead>
                  <tr>
                    <th></th>
                    <th class="text-center">
                      Color 1<br>
                    </th>
                    <th class="text-center">
                        Color 2<br>
                    </th>
                      <th class="text-center">
                          Color 3<br>
                      </th>
                      <th class="text-center">
                            Color 4<br>
                      </th>
                      <th class="text-center">
                              Color 5<br>
                      </th>
                  </tr>
                </thead>
                   <!--THE LINK COLORS WILL CHANGE DEPENDING UPON THE CLIENTS SITE COLORS-->
                  <tbody>
                    <tr>
                        <th class="text-nowrap" scope="row">Link Color &nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Choose the color for links that will appear on site pages.
                            "><i class="dripicons mdi mdi-help-circle-outline"></i></a></th>
                        <td><div class="custom-control custom-checkbox">
                            <input <?=(isset($site_design_obj->link_color) && $site_design_obj->link_color == '#DA6253' ? 'checked' : '')?> type="checkbox" class="custom-control-input" name="link_color" value="#DA6253" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1"><img src="/assets/images/color-swatch-da6253.jpg" alt="#DA6253"><br>#DA6253</label>
                        </div></td>
                        <td><div class="custom-control custom-checkbox">
                            <input <?=(isset($site_design_obj->link_color) && $site_design_obj->link_color == '#F93822' ? 'checked' : '')?> type="checkbox" class="custom-control-input" name="link_color" value="#F93822" id="customCheck2">
                            <label class="custom-control-label" for="customCheck2"><img src="/assets/images/color-swatchf93822.jpg" alt="#F93822"><br>#F93822</label>
                        </div></td>
                        <td><div class="custom-control custom-checkbox">
                            <input <?=(isset($site_design_obj->link_color) && $site_design_obj->link_color == '#590776' ? 'checked' : '')?> type="checkbox" class="custom-control-input" name="link_color" value="#590776" id="customCheck3">
                            <label class="custom-control-label" for="customCheck3"><img src="/assets/images/color-swatch590776.jpg" alt="#590776"><br>#590776</label>
                        </div></td>
                        <td><div class="custom-control custom-checkbox">
                            <input <?=(isset($site_design_obj->link_color) && $site_design_obj->link_color == '#926EBF' ? 'checked' : '')?> type="checkbox" class="custom-control-input" name="link_color" value="#926EBF" id="customCheck4">
                            <label class="custom-control-label" for="customCheck4"><img src="/assets/images/color-swatch926ebf.jpg" alt="#926ebf"><br>#926EBF</label>
                        </div></td>
                        <td><div class="custom-control custom-checkbox">
                            <input <?=(isset($site_design_obj->link_color) && $site_design_obj->link_color == '#C1C6C8' ? 'checked' : '')?> type="checkbox" class="custom-control-input" name="link_color" value="#C1C6C8" id="customCheck5">
                            <label class="custom-control-label" for="customCheck5"><img src="/assets/images/color-swatchC1C6C8.jpg" alt="#C1C6C8"><br>#C1C6C8</label>
                        </div></td>
                    </tr>
                    <tr>
                        <th class="text-nowrap" scope="row">Visited Link Color &nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Choose the color for links that have already been clicked/visited.
                            "><i class="dripicons mdi mdi-help-circle-outline"></i></a></th>
                        <td><div class="custom-control custom-checkbox">
                            <input <?=(isset($site_design_obj->visited_link_color) && $site_design_obj->visited_link_color == '#DA6253' ? 'checked' : '')?> type="checkbox" class="custom-control-input" name="visited_link_color" value="#DA6253" id="customCheck6">
                            <label class="custom-control-label" for="customCheck6"><img src="/assets/images/color-swatch-da6253.jpg" alt="#DA6253"><br>#DA6253</label>
                        </div></td>
                        <td><div class="custom-control custom-checkbox">
                            <input <?=(isset($site_design_obj->visited_link_color) && $site_design_obj->visited_link_color == '#53565A' ? 'checked' : '')?> type="checkbox" class="custom-control-input" name="visited_link_color" value="#53565A" id="customCheck7">
                            <label class="custom-control-label" for="customCheck7"><img src="/assets/images/color-swatch53565a.jpg" alt="#53565A"><br>#53565A</label>
                        </div></td>
                        <td><div class="custom-control custom-checkbox">
                            <input <?=(isset($site_design_obj->visited_link_color) && $site_design_obj->visited_link_color == '#590776' ? 'checked' : '')?> type="checkbox" class="custom-control-input" name="visited_link_color" value="#590776" id="customCheck8">
                            <label class="custom-control-label" for="customCheck8"><img src="/assets/images/color-swatch590776.jpg" alt="#590776"><br>#590776</label>
                        </div></td>
                        <td><div class="custom-control custom-checkbox">
                            <input <?=(isset($site_design_obj->visited_link_color) && $site_design_obj->visited_link_color == '#926EBF' ? 'checked' : '')?> type="checkbox" class="custom-control-input" name="visited_link_color" value="#926EBF" id="customCheck9">
                            <label class="custom-control-label" for="customCheck9"><img src="/assets/images/color-swatch926ebf.jpg" alt="#926ebf"><br>#926EBF</label>
                        </div></td>
                        <td><div class="custom-control custom-checkbox">
                            <input <?=(isset($site_design_obj->visited_link_color) && $site_design_obj->visited_link_color == '#C1C6C8' ? 'checked' : '')?> type="checkbox" class="custom-control-input" name="visited_link_color" value="#C1C6C8" id="customCheck10">
                            <label class="custom-control-label" for="customCheck10"><img src="/assets/images/color-swatchC1C6C8.jpg" alt="#C1C6C8"><br>#C1C6C8</label>
                        </div></td>
                    </tr>
                    <tr>
                        <th class="text-nowrap" scope="row">Active Link Color &nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="Choose the color for links to change to on mouse rollover.
                            "><i class="dripicons mdi mdi-help-circle-outline"></i></a></th>
                        <td><div class="custom-control custom-checkbox">
                            <input <?=(isset($site_design_obj->active_link_color) && $site_design_obj->active_link_color == '#DA6253' ? 'checked' : '')?> type="checkbox" class="custom-control-input" name="active_link_color" value="#DA6253" id="customCheck11">
                            <label class="custom-control-label" for="customCheck11"><img src="/assets/images/color-swatch-da6253.jpg" alt="#DA6253"><br>#DA6253</label>
                        </div></td>
                        <td><div class="custom-control custom-checkbox">
                            <input <?=(isset($site_design_obj->active_link_color) && $site_design_obj->active_link_color == '#53565A' ? 'checked' : '')?> type="checkbox" class="custom-control-input" name="active_link_color" value="#53565A" id="customCheck12">
                            <label class="custom-control-label" for="customCheck12"><img src="/assets/images/color-swatch53565a.jpg" alt="#53565A"><br>#53565A</label>
                        </div></td>
                        <td><div class="custom-control custom-checkbox">
                            <input <?=(isset($site_design_obj->active_link_color) && $site_design_obj->active_link_color == '#590776' ? 'checked' : '')?> type="checkbox" class="custom-control-input" name="active_link_color" value="#590776" id="customCheck13">
                            <label class="custom-control-label" for="customCheck13"><img src="/assets/images/color-swatch590776.jpg" alt="#590776"><br>#590776</label>
                        </div></td>
                        <td><div class="custom-control custom-checkbox">
                            <input <?=(isset($site_design_obj->active_link_color) && $site_design_obj->active_link_color == '#926EBF' ? 'checked' : '')?> type="checkbox" class="custom-control-input" name="active_link_color" value="#926EBF" id="customCheck14">
                            <label class="custom-control-label" for="customCheck14"><img src="/assets/images/color-swatch926ebf.jpg" alt="#926ebf"><br>#926EBF</label>
                        </div></td>
                        <td><div class="custom-control custom-checkbox">
                            <input <?=(isset($site_design_obj->active_link_color) && $site_design_obj->active_link_color == '#C1C6C8' ? 'checked' : '')?> type="checkbox" class="custom-control-input" name="active_link_color" value="#C1C6C8" id="customCheck15">
                            <label class="custom-control-label" for="customCheck15"><img src="/assets/images/color-swatchC1C6C8.jpg" alt="#C1C6C8"><br>#C1C6C8</label>
                        </div></td>
                      </tr>
                    </tbody>
                  </table>
                </div><!--end table div-->
              </div><!--end table div-->
            </div>
              <!--end row-->
              <!--begin new row-->
            <div class="row mt-10">
                <div class="col-sm-10">
                  <p class="text-muted font-14">
                  Choose a font for your site's body and Headlines. If you do not make changes here, your original site's fonts will be used.
                   </p>
                </div>
                <div class="col-sm-4">
                  <div class="form-group mb-3">
                      <label for="font-select">Body Font &nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="The Body Font is the typeface used for the main copy on the page. When choosing a body font, legibility should be the primary concern. We recommend choosing a serif/sans serif font that is easy to read at even a small size."><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                      <select name="body_font" class="form-control" id="font-select">
                          <option <?=(isset($site_design_obj->body_font) && $site_design_obj->body_font == 'Arial' ? 'selected' : '')?> value="Arial">Arial</option>
                          <option <?=(isset($site_design_obj->body_font) && $site_design_obj->body_font == 'Roboto' ? 'selected' : '')?> value="Roboto">Roboto</option>
                          <option <?=(isset($site_design_obj->body_font) && $site_design_obj->body_font == 'Helvetica' ? 'selected' : '')?> value="Helvetica">Helvetica</option>
                          <option <?=(isset($site_design_obj->body_font) && $site_design_obj->body_font == 'Verdana' ? 'selected' : '')?> value="Verdana">Verdana</option>
                          <option <?=(isset($site_design_obj->body_font) && $site_design_obj->body_font == 'Georgia' ? 'selected' : '')?> value="Georgia">Georgia</option>
                      </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group mb-3">
                      <label for="headline-select">Headline Font&nbsp;<a href="#" data-toggle="tooltip" title="" data-original-title="The Headline Font is the typeface used for the heading at the top of the page. When choosing a Headline Font, legibility is still important, but so is contrast. With that in mind, there is more leeway for using fun/decorative typefaces to grab attention.
                        "><i class="dripicons mdi mdi-help-circle-outline"></i></a></label>
                      <select name="headline_font" class="form-control" id="headline-select">
                          <option <?=(isset($site_design_obj->headline_font) && $site_design_obj->headline_font == 'Arial' ? 'selected' : '')?> value="Arial">Arial</option>
                          <option <?=(isset($site_design_obj->headline_font) && $site_design_obj->headline_font == 'Roboto' ? 'selected' : '')?> value="Roboto">Roboto</option>
                          <option <?=(isset($site_design_obj->headline_font) && $site_design_obj->headline_font == 'Helvetica' ? 'selected' : '')?> value="Helvetica">Helvetica</option>
                          <option <?=(isset($site_design_obj->headline_font) && $site_design_obj->headline_font == 'Verdana' ? 'selected' : '')?> value="Verdana">Verdana</option>
                          <option <?=(isset($site_design_obj->headline_font) && $site_design_obj->headline_font == 'Georgia' ? 'selected' : '')?> value="Georgia">Georgia</option>
                      </select>
                  </div>
              </div><!--end row-->
            </div>
            <div class="d-print-none mt-4">
                <div class="text-right">
                    <!--<button type="submit" class="btn btn-secondary">Cancel</button>&nbsp;&nbsp;-->
                    <button type="button" data-published="0" class="btn btn-info save-site-colors">Save Draft</button>&nbsp;&nbsp;
                    <button type="button" data-published="1" class="btn btn-primary save-site-colors">Publish</button>
                </div>
            </div>
            <!-- end buttons -->
            </form>
          </div>
        </div> <!-- end card body -->
      </div><!--end card-->
