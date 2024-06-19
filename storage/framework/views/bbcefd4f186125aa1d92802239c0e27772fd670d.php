<!-- resources/views/notes/user-profile.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="<?php echo e(asset('css/app4.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Profil de <?php echo e($user->first_name); ?> <?php echo e($user->family_name); ?></title>
</head>
<body>

    <div class="user-info-container">
        
            <div class="background-image">
                <img src="<?php echo e(asset('images/notes/photodecouverture.jpg')); ?>" alt="Profile Image">
                <div class="profile-image-container" >
                    <?php if($user->photo_de_profil): ?>
                        <img src="<?php echo e(asset('storage/' . $user->photo_de_profil)); ?>" alt="Photo de profil de <?php echo e($user->first_name); ?>">
                    <?php endif; ?>
                </div>
            </div>

            <div class="profile-infos">
                <div class="profile-name">
                    <h1><?php echo e($user->first_name); ?> <?php echo e($user->family_name); ?></h1>
                </div>  
                <div class="infos"> 
                    <div class="profile-university">
                        <p class="title-infos">University</p>
                        <p class="user-infos"><?php echo e($user->university); ?></p>
                    </div>
                    <div class="profile-filiére">
                        <p class="title-infos">Study Field</p>
                        <p class="user-infos"><?php echo e($user->study_field); ?></p>
                    </div>  
                    <div class="profile-niveau-d'étude">
                        <p class="title-infos">Study Level</p>
                        <p class="user-infos"> <?php echo e($user->study_level); ?></p>
                    </div>
                    <div class="profile-email">  
                        <p class="title-infos">Email</p>
                        <p class="user-infos">          <?php echo e($user->email); ?></p>
                    </div>
                </div>
            </div>

    </div>

    <div class="search-container">
        <input type="text" id="search-input" placeholder="Search..." oninput="searchNotes()">
        <button onclick="searchNotes()"><i class="fas fa-search"></i></button>
    </div>




    <div class="user-notes">
        
        <h3>Notes partagées par <?php echo e($user->first_name); ?> <?php echo e($user->family_name); ?></h3>
        <div class="container">
            <div class="content">
                <div id="notes-container">
                    <?php $__currentLoopData = $notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('notes.detail', ['id' => $note->id])); ?>" class="note-link">
                        <div class="note" data-topic="<?php echo e($note->topic->name); ?>">
                            <div class="note-container">
                                        <div class="user-info">
                                            
                                            
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
                                            
                                            <div class="image-container">
                                                <?php if($note->photo): ?>
                                                <img src="<?php echo e(asset('' . $note->photo)); ?>" alt="Photo de la note">
                                                <?php endif; ?>
                                            </div>

                                            <div class="more-details">
                                                <button class="see-more-button">
                                                    See More<i class="fas fa-arrow-right"></i>
                                                </button> 
                                            </div>
                                            
                                        </div>
                            
                        </div>
                    </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>



  <script>
    // Prevent redirection when clicking on icons, rating, or user elements
    document.querySelectorAll('.note-rating i, .note-actions i, .user-info i, .user-info .user-name').forEach(element => {
       element.addEventListener('click', (event) => {
       event.preventDefault(); // Prevent the default behavior
       });
       });
    // JavaScript for search functionality by topic, title, and keywords
   function searchNotes() {
        const searchTerm = document.getElementById('search-input').value.toLowerCase();
        const notes = document.querySelectorAll('.note');

        notes.forEach(note => {
            const title = note.querySelector('.note-title').textContent.toLowerCase();
            const topic = note.querySelector('.note-topic-id').textContent.toLowerCase();
            const name = note.querySelector('.user-name').textContent.toLowerCase();
            // You can add more selectors for other attributes like keywords if needed

            if (title.includes(searchTerm) || topic.includes(searchTerm) || name.includes(searchTerm)) {
                note.style.display = 'block';
            } else {
                note.style.display = 'none';
            }
        });
    }
    
    document.getElementById('search-input').addEventListener('input', searchNotes);
  </script>
    
</body>
</html>
<?php /**PATH C:\Users\Lenovo\OneDrive\Bureau\pfa_v2-pfav2\resources\views/notes/user-profile.blade.php ENDPATH**/ ?>