<div class="col-md-3">

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Folders</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="card-body p-0">
      <ul class="nav nav-pills flex-column">
        <li class="nav-item">
          <a href="message.php?unread" class="nav-link <?php if(isset($_GET['unread'])){echo "active" ;} ?>">
            <i class="fas fa-envelope"></i> Unread
            <?php //if (count($couter) != 0): ?>
              <span class="badge badge-warning float-right"><?php //echo count($couter); ?></span>
            <?php //endif ?>
          </a>
        </li>
        <li class="nav-item">
          <a href="message.php?readed" class="nav-link <?php if(isset($_GET['readed'])){echo "active" ;} ?>">
            <i class="far fa-envelope"></i> Readed
          </a>
        </li>
        <li class="nav-item">
          <a href="message.php?send" class="nav-link <?php if(isset($_GET['send'])){echo "active" ;} ?>">
            <i class="fas fa-share"></i> Sended
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>