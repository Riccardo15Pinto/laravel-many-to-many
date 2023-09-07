<!-- Modal -->
<div class="modal fade" id="{{ $project->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-danger" id="staticBackdropLabel">!!Attenzione!!</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>Sei sicuro di voler cancellare {{ $project->name_project }}?</h4>
            </div>
            <div class="modal-footer">
                @if (!request()->routeIs('admin.projects.trash'))
                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="delete-form"
                        data-name="{{ $project->name_project }}">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger">
                            <i class="fa-solid fa-trash-can"></i>
                            <span class="ms-2">Delete</span>
                        </button>
                    </form>
                @else
                    <form action="{{ route('admin.projects.trash.drop', $project->id) }}" method="Post"
                        class="restore-all-form ms-2">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">Elimina definitivamente</button>
                    </form>
                @endif
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
