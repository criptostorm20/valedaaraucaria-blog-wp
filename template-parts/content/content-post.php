<div id="modal-gallery" class="overlay h-100 w-100 d-flex">
  <a href="#" class="close">&times;</a>
  <div class="container align-self-center full-post">
    <div class="container h-100">
      <div class="row py-0 h-100">
        <div class="col-8 px-0 h-100 bg-img">
          <img id="post-img" src="#" class="img-fluid w-100 h-100">
        </div>
        <div class="col-4 post-content h-100">
          <div class="scrollable">
            <div class="row p-0">
              <div class="col">
                <div class="post-head">
                  <div class="post-title">
                  </div>
                  <div class="post-text">
                  </div>
                </div>
              </div>
            </div>
            <div class="row p-0">
              <div class="col">
                <div class="post-comments">
                </div>
              </div>
            </div>
          </div>
            
          <div class="row p-0">
            <div class="col"><?php comments_template(); ?></div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>