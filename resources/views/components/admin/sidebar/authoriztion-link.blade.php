<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#authorization" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-cog"></i>
      <span>Authorization</span>
    </a>
    <div id="authorization" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Authorization</h6>
        <a class="collapse-item" href={{route('roles.index')}}>Roles</a>
        <a class="collapse-item" href={{route('permissions.index')}}>Permission</a>
      </div>
    </div>
</li>