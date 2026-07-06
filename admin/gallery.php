<?php
// Admin Gallery Module
require_once __DIR__ . '/includes/header.php';

// Pagination parameters
$limit = 12;
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$offset = ($page - 1) * $limit;

// Search query parameter
$search = trim($_GET['search'] ?? '');

try {
    // Build SQL query based on search query
    if (!empty($search)) {
        // Count matching records
        $count_stmt = $pdo->prepare("SELECT COUNT(*) FROM gallery WHERE title LIKE ? OR description LIKE ?");
        $count_stmt->execute(["%$search%", "%$search%"]);
        $total_rows = $count_stmt->fetchColumn();

        // Fetch paginated matching records
        $stmt = $pdo->prepare("SELECT * FROM gallery WHERE title LIKE ? OR description LIKE ? ORDER BY created_at DESC LIMIT :offset, :limit");
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute(["%$search%", "%$search%"]);
        $images = $stmt->fetchAll();
    } else {
        // Count all records
        $count_stmt = $pdo->query("SELECT COUNT(*) FROM gallery");
        $total_rows = $count_stmt->fetchColumn();

        // Fetch all paginated records
        $stmt = $pdo->prepare("SELECT * FROM gallery ORDER BY created_at DESC LIMIT :offset, :limit");
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        $images = $stmt->fetchAll();
    }

    $total_pages = ceil($total_rows / $limit);

} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}
?>

<!-- Image Management Grid -->
<div class="row mb-4" data-aos="fade-up">
    <div class="col-12">
        <div class="card border-0 bg-white p-4 shadow-sm" style="border-radius: 20px;">
            <!-- Search & Actions Bar -->
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
                <div class="d-flex align-items-center gap-3">
                    <h3 class="h5 fw-bold text-dark mb-0">Gallery Items (<?php echo $total_rows; ?>)</h3>
                    <button type="button" class="btn btn-warning fw-semibold px-3 py-1 btn-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#addPhotoModal">
                        <i class="fa-solid fa-plus me-1"></i>Add Photo
                    </button>
                </div>
                
                <form action="gallery.php" method="GET" class="d-flex gap-2" style="max-width: 400px; width: 100%;">
                    <div class="input-group">
                        <span class="input-group-text bg-light border-0 text-muted" id="search-addon">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </span>
                        <input type="text" class="form-control bg-light border-0" placeholder="Search by title or details..." name="search" value="<?php echo htmlspecialchars($search); ?>" aria-label="Search" aria-describedby="search-addon">
                        <?php if (!empty($search)): ?>
                            <a href="gallery.php" class="btn btn-light border-0"><i class="fa-solid fa-xmark"></i></a>
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-warning fw-semibold px-3">Search</button>
                </form>
            </div>

            <!-- Empty State -->
            <?php if (empty($images)): ?>
                <div class="text-center py-5">
                    <div class="mb-3 text-muted"><i class="fa-solid fa-image fa-4x"></i></div>
                    <h4 class="h5 fw-bold text-dark">No Blouse Designs Found</h4>
                    <p class="text-muted">Upload some images above to showcase them in the gallery.</p>
                </div>
            <?php else: ?>
                <!-- Gallery Grid -->
                <div class="row g-4 mb-4">
                    <?php foreach ($images as $item): ?>
                        <div class="col-md-6 col-lg-3 col-xl-3" id="gallery-card-<?php echo $item['id']; ?>">
                            <div class="image-admin-card">
                                <img src="../uploads/gallery/<?php echo htmlspecialchars($item['image_name']); ?>" alt="<?php echo htmlspecialchars($item['title']); ?>" class="image-admin-thumb">
                                <div class="image-admin-body">
                                    <div>
                                        <div class="d-flex align-items-start justify-content-between gap-2">
                                            <h4 class="image-admin-title" id="title-text-<?php echo $item['id']; ?>"><?php echo htmlspecialchars($item['title']); ?></h4>
                                            <label class="switch-status" title="Toggle Visibility">
                                                <input type="checkbox" class="toggle-visibility" data-id="<?php echo $item['id']; ?>" <?php echo $item['status'] == 1 ? 'checked' : ''; ?>>
                                                <span class="slider-status"></span>
                                            </label>
                                        </div>
                                        <p class="image-admin-desc" id="desc-text-<?php echo $item['id']; ?>"><?php echo htmlspecialchars($item['description']); ?></p>
                                    </div>
                                    
                                    <div>
                                        <div class="image-admin-meta">
                                            <i class="fa-solid fa-calendar-days me-1"></i><?php echo date('d M, Y', strtotime($item['created_at'])); ?>
                                        </div>
                                        
                                        <div class="image-admin-actions">
                                            <button class="btn btn-outline-warning btn-sm flex-grow-1 edit-btn" 
                                                    data-id="<?php echo $item['id']; ?>"
                                                    data-title="<?php echo htmlspecialchars($item['title']); ?>"
                                                    data-desc="<?php echo htmlspecialchars($item['description']); ?>"
                                                    data-image="<?php echo htmlspecialchars($item['image_name']); ?>"
                                                    data-bs-toggle="modal" data-bs-target="#editModal">
                                                <i class="fa-solid fa-pen-to-square me-1"></i>Edit
                                            </button>
                                            <button class="btn btn-outline-danger btn-sm delete-btn" 
                                                    data-id="<?php echo $item['id']; ?>"
                                                    data-bs-toggle="modal" data-bs-target="#deleteModal">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Pagination -->
                <?php if ($total_pages > 1): ?>
                    <nav aria-label="Gallery pagination" class="d-flex justify-content-center">
                        <ul class="pagination pagination-sm">
                            <li class="page-item <?php echo $page <= 1 ? 'disabled' : ''; ?>">
                                <a class="page-link" href="?page=<?php echo $page - 1; ?>&search=<?php echo urlencode($search); ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                <li class="page-item <?php echo $i == $page ? 'active' : ''; ?>">
                                    <a class="page-link" href="?page=<?php echo $i; ?>&search=<?php echo urlencode($search); ?>"><?php echo $i; ?></a>
                                </li>
                            <?php endfor; ?>
                            <li class="page-item <?php echo $page >= $total_pages ? 'disabled' : ''; ?>">
                                <a class="page-link" href="?page=<?php echo $page + 1; ?>&search=<?php echo urlencode($search); ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- EDIT MODAL -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 16px;">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold text-dark" id="editModalLabel">Edit Design Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editForm" enctype="multipart/form-data">
                <div class="modal-body py-4">
                    <input type="hidden" id="editId" name="id">
                    
                    <div class="text-center mb-3">
                        <label class="form-label text-muted small fw-bold d-block uppercase mb-2">Current Image</label>
                        <div style="height: 120px; display: inline-flex; align-items: center; justify-content: center; overflow: hidden; border-radius: 12px; border: 1px solid #ddd;" class="bg-light px-2">
                            <img id="editImagePreview" src="" class="img-fluid" style="object-fit: contain; max-height: 100%; max-width: 100%;">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="editTitle" class="form-label text-muted small fw-bold uppercase">Title</label>
                        <input type="text" class="form-control border-light-subtle bg-light" id="editTitle" name="title" required maxlength="100">
                    </div>
                    
                    <div class="mb-3">
                        <label for="editDesc" class="form-label text-muted small fw-bold uppercase">Description</label>
                        <textarea class="form-control border-light-subtle bg-light" id="editDesc" name="description" rows="3" required></textarea>
                    </div>

                    <div>
                        <label for="editFile" class="form-label text-muted small fw-bold uppercase">Replace Image (Optional)</label>
                        <input type="file" class="form-control border-light-subtle bg-light" id="editFile" name="image" accept="image/jpeg, image/jpg, image/png, image/webp">
                        <div class="form-text text-muted" style="font-size: 11px;">Leave empty to keep current image. Max size 5MB.</div>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-light btn-sm px-3" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warning btn-sm px-4 fw-semibold">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ADD PHOTO MODAL -->
<div class="modal fade" id="addPhotoModal" tabindex="-1" aria-labelledby="addPhotoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content" style="border-radius: 16px;">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold text-dark" id="addPhotoModalLabel">Add New Design Photo(s)</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addPhotoForm" enctype="multipart/form-data">
                <div class="modal-body py-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="addTitle" class="form-label text-muted small fw-bold uppercase">Title</label>
                                <input type="text" class="form-control border-light-subtle bg-light" id="addTitle" name="title" required maxlength="100" placeholder="e.g. Traditional Silk Blouse">
                            </div>
                            <div>
                                <label for="addDesc" class="form-label text-muted small fw-bold uppercase">Description</label>
                                <textarea class="form-control border-light-subtle bg-light" id="addDesc" name="description" rows="5" required placeholder="Describe the design details, stitching work..."></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-muted small fw-bold uppercase">Upload Multiple Images</label>
                            <!-- Drag & Drop Zone inside Modal -->
                            <div class="drag-drop-area p-4 text-center" id="modalDragDropArea" style="cursor: pointer; border: 2px dashed rgba(212, 175, 55, 0.6); border-radius: 16px; background-color: var(--cream);">
                                <div class="upload-icon mb-2" style="font-size: 2.5rem; color: var(--gold-dark);"><i class="fa-solid fa-cloud-arrow-up"></i></div>
                                <h6 class="fw-bold mb-1" style="font-size: 14px;">Drag & drop files or click to browse</h6>
                                <p class="text-muted mb-0" style="font-size: 11px;">Supports JPG, JPEG, PNG, WEBP (Max 5MB)</p>
                                <input type="file" id="modalFileInput" name="images[]" multiple accept="image/jpeg, image/jpg, image/png, image/webp" class="d-none">
                            </div>
                            
                            <!-- Queue display -->
                            <div class="mt-3" id="modalUploadQueueContainer" style="display: none; max-height: 185px; overflow-y: auto;">
                                <h6 class="fw-bold text-dark" style="font-size: 13px;">Selected Files:</h6>
                                <div class="list-group" id="modalPreviewQueueGrid"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-light btn-sm px-3" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warning btn-sm px-4 fw-semibold" id="submitAddPhotoBtn">
                        <span class="spinner-border spinner-border-sm me-2 d-none" id="addPhotoSpinner" role="status" aria-hidden="true"></span>
                        Upload & Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- DELETE CONFIRMATION MODAL -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content" style="border-radius: 16px;">
            <div class="modal-body text-center py-4">
                <div class="text-danger mb-3"><i class="fa-solid fa-circle-exclamation fa-3x"></i></div>
                <h5 class="fw-bold text-dark">Are you sure?</h5>
                <p class="text-muted small mb-0">This will permanently delete this blouse design from both the server and database.</p>
                <input type="hidden" id="deleteId">
            </div>
            <div class="modal-footer border-0 justify-content-center pt-0">
                <button type="button" class="btn btn-light btn-sm px-3" data-bs-dismiss="modal">No, Keep It</button>
                <button type="button" class="btn btn-danger btn-sm px-3 fw-semibold" id="confirmDeleteBtn">Yes, Delete</button>
            </div>
        </div>
    </div>
</div>

<!-- Upload and Edit AJAX scripts -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    // ==========================================
    // 1. ADD PHOTO MODAL & MULTI-UPLOAD
    // ==========================================
    const modalDragDropArea = document.getElementById('modalDragDropArea');
    const modalFileInput = document.getElementById('modalFileInput');
    const modalQueueContainer = document.getElementById('modalUploadQueueContainer');
    const modalPreviewQueueGrid = document.getElementById('modalPreviewQueueGrid');
    const addPhotoForm = document.getElementById('addPhotoForm');
    const addPhotoSpinner = document.getElementById('addPhotoSpinner');
    const submitAddPhotoBtn = document.getElementById('submitAddPhotoBtn');

    let selectedFiles = [];

    // Trigger click on file input
    modalDragDropArea.addEventListener('click', () => modalFileInput.click());

    // Drag and drop mechanics
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        modalDragDropArea.addEventListener(eventName, (e) => {
            e.preventDefault();
            e.stopPropagation();
        }, false);
    });

    ['dragenter', 'dragover'].forEach(eventName => {
        modalDragDropArea.addEventListener(eventName, () => modalDragDropArea.classList.add('bg-secondary', 'bg-opacity-10'), false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        modalDragDropArea.addEventListener(eventName, () => modalDragDropArea.classList.remove('bg-secondary', 'bg-opacity-10'), false);
    });

    modalDragDropArea.addEventListener('drop', (e) => {
        const files = e.dataTransfer.files;
        appendSelectedFiles(files);
    });

    modalFileInput.addEventListener('change', (e) => {
        appendSelectedFiles(e.target.files);
    });

    function appendSelectedFiles(files) {
        if (!files.length) return;

        modalQueueContainer.style.display = 'block';

        Array.from(files).forEach(file => {
            // Validate File Size (Max 5MB)
            if (file.size > 5 * 1024 * 1024) {
                alert(`File "${file.name}" exceeds the 5MB size limit and was skipped.`);
                return;
            }

            // Validate Mime Types
            const allowed = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
            if (!allowed.includes(file.type)) {
                alert(`File "${file.name}" has an invalid format. Supported: JPG, JPEG, PNG, WEBP.`);
                return;
            }

            // Append to our files array
            selectedFiles.push(file);

            // Create file listing row in queue
            const fileId = 'sel-' + Math.random().toString(36).substr(2, 9);
            const item = document.createElement('div');
            item.className = 'list-group-item d-flex align-items-center justify-content-between p-2 mb-1 border-0 bg-light rounded';
            item.id = fileId;
            item.innerHTML = `
                <div class="d-flex align-items-center gap-2 overflow-hidden">
                    <div style="width: 40px; height: 40px; overflow:hidden; border-radius:4px; display:flex; align-items:center; justify-content:center;" class="bg-white border">
                        <img src="" class="img-fluid" id="prev-${fileId}" style="object-fit: cover; width:100%; height:100%;">
                    </div>
                    <div class="d-flex flex-column text-start">
                        <span class="text-truncate small fw-semibold text-dark" style="max-width: 180px;">${file.name}</span>
                        <span class="text-muted text-xxs" style="font-size: 10px;">(${(file.size / 1024 / 1024).toFixed(2)} MB)</span>
                    </div>
                </div>
                <button type="button" class="btn btn-outline-danger btn-xs py-0 px-1 border-0 remove-selected" data-id="${fileId}"><i class="fa-solid fa-xmark"></i></button>
            `;

            modalPreviewQueueGrid.appendChild(item);

            // Read preview url
            const reader = new FileReader();
            reader.onload = (e) => {
                const img = document.getElementById(`prev-${fileId}`);
                if (img) img.src = e.target.result;
            };
            reader.readAsDataURL(file);
        });

        // Add events to remove buttons
        bindRemoveButtons();
    }

    function bindRemoveButtons() {
        document.querySelectorAll('.remove-selected').forEach(btn => {
            btn.onclick = (e) => {
                e.stopPropagation();
                const id = btn.getAttribute('data-id');
                const element = document.getElementById(id);
                const index = Array.from(modalPreviewQueueGrid.children).indexOf(element);
                if (index > -1) {
                    selectedFiles.splice(index, 1);
                }
                if (element) element.remove();
                if (!selectedFiles.length) {
                    modalQueueContainer.style.display = 'none';
                    modalFileInput.value = '';
                }
            };
        });
    }

    // Submit Add Photo Form
    addPhotoForm.addEventListener('submit', (e) => {
        e.preventDefault();

        if (selectedFiles.length === 0) {
            window.showNotification('Please select or drag at least one image file.', 'warning');
            return;
        }

        const title = document.getElementById('addTitle').value;
        const description = document.getElementById('addDesc').value;

        // Build FormData
        const formData = new FormData();
        formData.append('title', title);
        formData.append('description', description);
        
        selectedFiles.forEach(file => {
            formData.append('images[]', file);
        });

        // UI state
        submitAddPhotoBtn.disabled = true;
        addPhotoSpinner.classList.remove('d-none');

        fetch('upload_ajax.php', {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            submitAddPhotoBtn.disabled = false;
            addPhotoSpinner.classList.add('d-none');

            if (data.success) {
                window.showNotification(data.message, 'success');
                // Reset form and variables
                addPhotoForm.reset();
                selectedFiles = [];
                modalPreviewQueueGrid.innerHTML = '';
                modalQueueContainer.style.display = 'none';
                
                // Close Modal
                bootstrap.Modal.getInstance(document.getElementById('addPhotoModal')).hide();
                // Reload page
                setTimeout(() => {
                    window.location.reload();
                }, 1200);
            } else {
                window.showNotification(data.error || 'Upload failed.', 'danger');
            }
        })
        .catch(() => {
            submitAddPhotoBtn.disabled = false;
            addPhotoSpinner.classList.add('d-none');
            window.showNotification('Network connection error during upload.', 'danger');
        });
    });

    // Reset Add Form variables when Modal is closed
    document.getElementById('addPhotoModal').addEventListener('hidden.bs.modal', () => {
        addPhotoForm.reset();
        selectedFiles = [];
        modalPreviewQueueGrid.innerHTML = '';
        modalQueueContainer.style.display = 'none';
    });

    // ==========================================
    // 2. VISIBILITY TOGGLE ACTIONS
    // ==========================================
    document.querySelectorAll('.toggle-visibility').forEach(checkbox => {
        checkbox.addEventListener('change', (e) => {
            const id = checkbox.getAttribute('data-id');
            const status = checkbox.checked ? 1 : 0;

            fetch(`ajax_handlers.php?action=toggle_status`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `id=${id}&status=${status}`
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    window.showNotification('Visibility status updated.', 'success');
                } else {
                    window.showNotification(data.error || 'Failed to update visibility.', 'danger');
                    checkbox.checked = !checkbox.checked;
                }
            })
            .catch(() => {
                window.showNotification('Network connection error.', 'danger');
                checkbox.checked = !checkbox.checked;
            });
        });
    });

    // ==========================================
    // 3. EDIT DESIGN DETAILS & REPLACE IMAGE
    // ==========================================
    document.querySelectorAll('.edit-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const id = btn.getAttribute('data-id');
            const title = btn.getAttribute('data-title');
            const desc = btn.getAttribute('data-desc');
            const image = btn.getAttribute('data-image');

            document.getElementById('editId').value = id;
            document.getElementById('editTitle').value = title;
            document.getElementById('editDesc').value = desc;
            document.getElementById('editImagePreview').src = `../uploads/gallery/${image}`;
            document.getElementById('editFile').value = ''; // Reset file replacement input
        });
    });

    // Submit Edit Form AJAX
    document.getElementById('editForm').addEventListener('submit', (e) => {
        e.preventDefault();
        
        const formElement = document.getElementById('editForm');
        const formData = new FormData(formElement);
        const id = document.getElementById('editId').value;
        const title = document.getElementById('editTitle').value;
        const desc = document.getElementById('editDesc').value;

        const submitBtn = formElement.querySelector('button[type="submit"]');
        const originalBtnText = submitBtn.innerHTML;
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Saving...';

        fetch(`ajax_handlers.php?action=edit`, {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalBtnText;

            if (data.success) {
                // Update elements in the DOM directly
                document.getElementById(`title-text-${id}`).innerText = title;
                document.getElementById(`desc-text-${id}`).innerText = desc;
                
                // If image was replaced, update the grid preview thumbnail
                if (data.image_name) {
                    const cardImg = document.querySelector(`#gallery-card-${id} img.image-admin-thumb`);
                    if (cardImg) {
                        cardImg.src = `../uploads/gallery/${data.image_name}?t=${Date.now()}`;
                    }

                    // Update data-image attribute on edit button
                    const btn = document.querySelector(`.edit-btn[data-id="${id}"]`);
                    if (btn) {
                        btn.setAttribute('data-image', data.image_name);
                    }
                }

                // Update data attributes of edit button
                const btn = document.querySelector(`.edit-btn[data-id="${id}"]`);
                if (btn) {
                    btn.setAttribute('data-title', title);
                    btn.setAttribute('data-desc', desc);
                }

                // Close Modal
                bootstrap.Modal.getInstance(document.getElementById('editModal')).hide();
                window.showNotification('Design details updated successfully.', 'success');
            } else {
                window.showNotification(data.error || 'Update failed.', 'danger');
            }
        })
        .catch(() => {
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalBtnText;
            window.showNotification('Network connection error.', 'danger');
        });
    });

    // ==========================================
    // 4. DELETE DESIGN ACTIONS
    // ==========================================
    document.querySelectorAll('.delete-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            document.getElementById('deleteId').value = btn.getAttribute('data-id');
        });
    });

    document.getElementById('confirmDeleteBtn').addEventListener('click', () => {
        const id = document.getElementById('deleteId').value;

        fetch(`ajax_handlers.php?action=delete`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `id=${id}`
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                // Remove visual card element with fade out
                const card = document.getElementById(`gallery-card-${id}`);
                if (card) {
                    card.classList.add('fade-out');
                    setTimeout(() => card.remove(), 400);
                }
                
                bootstrap.Modal.getInstance(document.getElementById('deleteModal')).hide();
                window.showNotification('Design deleted successfully.', 'success');
                
                // Reload on empty page
                setTimeout(() => {
                    if (document.querySelectorAll('[id^="gallery-card-"]').length === 0) {
                        window.location.reload();
                    }
                }, 500);
            } else {
                window.showNotification(data.error || 'Delete failed.', 'danger');
            }
        })
        .catch(() => {
            window.showNotification('Network connection error.', 'danger');
        });
    });
});
</script>

<style>
/* CSS transition for soft fades */
.fade-out {
    opacity: 0;
    transform: scale(0.9);
    transition: all 0.4s ease-out;
}
</style>

<?php
require_once __DIR__ . '/includes/footer.php';
?>
