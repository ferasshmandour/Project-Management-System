<aside class="text-light p-4 rounded bg-dark" style="height: 800px; overflow-y: auto;">
    <!-- Project Panel -->
    <div class="mb-5">
        <h5 class="mb-3 border-bottom pb-2 text-center">Project Panel</h5>
        <ul class="list-unstyled">
            <li class="mb-2">
                <a href="{{ route('projects.index') }}"
                    class="text-light text-decoration-none d-flex align-items-center p-2 rounded hover-link">
                    <i class="bi bi-folder me-2"></i> View Projects
                </a>
            </li>
            <li>
                <a href="{{ route('projects.create') }}"
                    class="text-light text-decoration-none d-flex align-items-center p-2 rounded hover-link">
                    <i class="bi bi-plus-square me-2"></i> Create Project
                </a>
            </li>
        </ul>
    </div>

    <div>
        <h5 class="mb-3 border-bottom pb-2 text-center">Task Panel</h5>
        <ul class="list-unstyled">
            <li class="mb-2">
                <a href="{{ route('tasks.index') }}"
                    class="text-light text-decoration-none d-flex align-items-center p-2 rounded hover-link">
                    <i class="bi bi-list-check me-2"></i> View Tasks
                </a>
            </li>
            <li>
                <a href="{{ route('tasks.create') }}"
                    class="text-light text-decoration-none d-flex align-items-center p-2 rounded hover-link">
                    <i class="bi bi-plus-square me-2"></i> Create Task
                </a>
            </li>
            <li>
                <a href="{{ route('tasks.assigned') }}"
                    class="text-light text-decoration-none d-flex align-items-center p-2 rounded hover-link">
                    <i class="bi bi-plus-square me-2"></i> Task Assignment
                </a>
            </li>
        </ul>
    </div>
</aside>
