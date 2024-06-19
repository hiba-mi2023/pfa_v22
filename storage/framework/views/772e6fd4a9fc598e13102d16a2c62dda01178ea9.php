<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app1.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <div class="user-info-container">
        <div class="background-image">
            <img src="<?php echo e(asset('images/notes/photodecouverture.jpg')); ?>" alt="Profile Image">
            <div class="profile-image-container" onclick="openUploadWindow()">
                <img src="<?php echo e($user->photo_de_profil ? asset('storage/' . $user->photo_de_profil) : asset('images/notes/photodeprofile.png')); ?>" alt="Profile Image">

            </div>
            
        </div>
        <div class="pencil-icon" onclick="toggleEditForm()">
            <img src="<?php echo e(asset('images/notes/icone_modification_profile.png')); ?>" alt="Edit Icon">
            <?php if(Auth::check()): ?>
                 <a href="<?php echo e(route('notes.display-note')); ?>">Voir les notes</a>
           <?php endif; ?>
        </div>
        <div class="profile-infos">
            <div class="profile-name">
                <h1><?php echo e($user->first_name); ?></h1>
                <h1><?php echo e($user->family_name); ?></h1>
            </div>
            <div class="infos">
                <div class="profile-university">
                    <p><?php echo e($user->university); ?></p>
                </div>
                <div class="profile-filiére">
                    <p><?php echo e($user->study_field); ?></p>
                </div>
                <div class="profile-niveau-d'étude">
                    <p><?php echo e($user->study_level); ?></p>
                </div>
                <div class="profile-coordonées">
                    <p><?php echo e($user->phone); ?></p>
                </div>
                <div class="profile-email">
                    <p><?php echo e($user->email); ?></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit form (hidden by default) -->
    <div id="edit-form" class="edit-form" style="display: none;">
        <!-- Edit form elements -->
        <form action="<?php echo e(route('profile.update', ['id' => $user->id])); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PATCH'); ?>
            <label>Nom:</label>
            <input type="text" name="first_name" value="<?php echo e($user->first_name); ?>" required><br>
            <label>Prénom:</label>
            <input type="text" name="family_name" value="<?php echo e($user->family_name); ?>" required><br>
            <label for="email">Email:</label><br>
            <input type="email" name="email" value="<?php echo e($user->email); ?>" required><br>
            <label>Numéro de téléphone:</label><br>
            <input type="text" name="phone" value="<?php echo e($user->phone); ?>"><br>
            <label>Université:</label><br>
            <input type="text" name="university" value="<?php echo e($user->university); ?>"><br>
            <label>filiere:</label><br>
            <input type="text" name="study_field" value="<?php echo e($user->study_field); ?>"><br>
            <input type="file" name="profile_image" accept="image/*" required>
            
       
            <button type="submit">Enregistrer les modifications</button>
        </form>
    </div>

    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Search...">
        <button onclick="search()"><i class="fas fa-search"></i></button>
    </div>

    <div class="row">
        <h3>Notes</h3>
        <?php echo e(dd($user->notes)); ?>

        <div><a href="<?php echo e(route('notes.add')); ?>" id="add-note-btn" class="add-note-btn">Add Note</a></div>
    <div class="container">
    <div class="content">
        <div id="notes-container">
            <?php $__currentLoopData = $notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('notes.detail', ['id' => $note->id])); ?>" class="note-link">
                <div class="note" data-topic="<?php echo e($note->topic->name); ?>">
                    <div class="note-container">
                        
                         <div class="user-info">
                            <div class="user-img">
                                <?php if($note->user->photo_de_profil): ?>
                                    <img  src="<?php echo e(asset('storage/' . $note->user->photo_de_profil)); ?>" alt="Photo de profil de <?php echo e($note->user->first_name); ?>">
                                <?php endif; ?>
                            </div>
                            <?php if($note->user): ?>
                            <p class="user-name"><?php echo e($note->user->first_name); ?> <?php echo e($note->user->family_name); ?></p>
                            <?php endif; ?>
                         </div>
                         
                         <div class="note-rating">
                            <i class="fa-regular fa-star" data-rating="1"></i>
                            <i class="fa-regular fa-star" data-rating="2"></i>
                            <i class="fa-regular fa-star" data-rating="3"></i>
                            <i class="fa-regular fa-star" data-rating="4"></i>
                            <i class="fa-regular fa-star" data-rating="5"></i>
                        </div>
                        <div class="note-actions">
                            <i class="fa-regular fa-floppy-disk"></i>
                            <i class="fa-solid fa-share"></i>
                            <i class="fa-solid fa-triangle-exclamation"></i>
                        </div>
                    </div>
                    <hr/>

                    <div class="note-details">
                        <h3 class="note-title"><?php echo e($note->title); ?></h3>
                        <p class="note-topic-id">Topic: <?php echo e($note->topic->name); ?></p>
                    </div>
                    
                    <div class="image-container">
                       <img src="<?php echo e(asset('' . $note->photo)); ?>" alt="Photo de la note">
                    </div>
                    
                    <div class="more-details">
                        <button class="see-more-button">
                            See More<i class="fas fa-arrow-right"></i>
                        </button> 
                    </div>
                   
                    
                </div>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    </div>
    </div>

    <script>
        function search() {
            var searchInput = document.getElementById("searchInput").value;
            var searchResults = document.getElementById("searchResults");
            searchResults.innerHTML = "<p>Search results for: " + searchInput + "</p>";
        }

        function openUploadWindow() {
            var modal = document.getElementById("upload-modal");
            modal.style.display = "block";
        }

        function closeUploadWindow() {
            var modal = document.getElementById("upload-modal");
            modal.style.display = "none";
        }

        function toggleEditForm() {
            var editForm = document.getElementById('edit-form');
            if (editForm.style.display === 'none' || editForm.style.display === '') {
                editForm.style.display = 'block';
            } else {
                editForm.style.display = 'none';
            }
        }
    </script>
</body>
</html>
<?php /**PATH C:\Users\Lenovo\OneDrive\Bureau\pfa_v2-pfav2\resources\views/notes/display-user.blade.php ENDPATH**/ ?>