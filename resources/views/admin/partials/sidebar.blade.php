<aside class="bg-dark">

    <nav>
        <ul class="p-0">
            <li>
                <a class="{{ Route::currentRouteName() === 'admin.home' ? 'active' : '' }}"
                    href="{{ route('admin.home') }}"><i class="fa-solid fa-chart-line"></i>Dashboard</a>
            </li>
            <li>
                <a class="{{ Route::currentRouteName() === 'admin.projects.index' ? 'active' : '' }}"
                    href="{{ route('admin.projects.index') }}"><i class="fa-solid fa-list"></i>List projects</a>
            </li>
            <li>
                <a class="{{ Route::currentRouteName() === 'admin.projects.create' ? 'active' : '' }}"
                    href="{{ route('admin.projects.create') }}"><i class="fa-solid fa-folder-plus"></i>New project</a>
            </li>
            <li>
                <a class="{{ Route::currentRouteName() === 'admin.technologies.index' ? 'active' : '' }}"
                    href="{{ route('admin.technologies.index') }}"><i class="fa-solid fa-microchip"></i>Technologies</a>
            </li>
            <li>
                <a class="{{ Route::currentRouteName() === 'admin.types.index' ? 'active' : '' }}"
                    href="{{ route('admin.types.index') }}"><i class="fa-solid fa-window-restore"></i>Types</a>
            </li>
            <li>
                <a class="{{ Route::currentRouteName() === 'admin.type-project' ? 'active' : '' }}"
                    href="{{ route('admin.type-project') }}"><i class="fa-solid fa-layer-group"></i>Projects by
                    type</a>
            </li>
        </ul>
    </nav>

</aside>
