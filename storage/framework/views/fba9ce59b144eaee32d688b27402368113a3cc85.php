
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note Details</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="note-detailed">

        <div class="note-container">
            
            <div class="user-info">
                <div class="user-img">
                    <?php if($note->user->photo_de_profil): ?>
                        <img  src="<?php echo e(asset('storage/' . $note->user->photo_de_profil)); ?>" >
                    <?php endif; ?>
                    </div>
                <?php if($note->user): ?>
                <p> <?php echo e($note->user->first_name); ?> <?php echo e($note->user->family_name); ?></p>
                <?php endif; ?>
                <div>
                    <p class="note-published-at"><?php echo e($note->created_at); ?></p>
                </div>
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
            <div class="note-details-1">
                <p class="note-topic-name">Topic:<?php echo e($note->topic->name); ?> </p>
                <?php if($note->topic): ?>
                <?php if($note->topic->discipline->discipline): ?>
                    <p class="note-discipline">Discipline: <?php echo e($note->topic->discipline->discipline); ?></p>
                <?php endif; ?>
                <?php endif; ?>
            </div>

        </div>

        <div class="image-container">
         <img src="<?php echo e(asset('' . $note->photo)); ?>" alt="Photo de la note">

        </div>

        <div class="another-details">

            <p class="note-description">Description:<?php echo e($note->description); ?></p>
            <p class="note-keywords">Keywords: <?php echo e($note->keywords); ?></p>

        </div>

        <div class="note-buttons">

            <button class="like-note-button"><i class="fa-regular fa-heart"></i> Like</button>
            <button class="comment-button" id="comment-button" name="comment-button"><i class="fa-regular fa-comment"></i> Comment</button>  
        
        </div>

        <div class="comment-section" id="comment-section" style="display: none;">
            <form class="comment-section" id="comment-form" action="<?php echo e(route('notes.commentaires.store', ['id' => $note->id])); ?>" method="POST">
                <div class="comment">
                    <div class="comment-user">
                        <?php echo csrf_field(); ?>    
                        <div class="user-img">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <input type="hidden" name="ID_note" value="<?php echo e($note->id); ?>">
                        <textarea  id="comment-input" name="Contenu" placeholder="Write a comment..." rows="1"></textarea>
                        
                    </div>
                </div>
                        <button type="submit" id="publish-button" style="display: none;">publish</button>
                </div>
            </form>

            <div id="existing-comments" style="display: none;">
              
                <?php $__currentLoopData = $note->commentaires; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commentaire): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                
                <div class="user-img">
                    <?php if($commentaire->utilisateur->photo_de_profil): ?>
                        <img src="<?php echo e(asset('storage/' . $commentaire->utilisateur->photo_de_profil)); ?>"  class="profile-picture">
                    <?php else: ?>
                        <img src="<?php echo e(asset('storage/default-profile-picture.png')); ?>"  class="profile-picture">
                    <?php endif; ?>
                </div>

                <div class ="comments">
                    
                    <div class="comment-header">

                        <span><?php echo e($commentaire->utilisateur->first_name); ?> <?php echo e($commentaire->utilisateur->family_name); ?></span>
                        <small class="note-published-at"><?php echo e($commentaire->created_at); ?></small>
                    
                    </div>
                    
                    <p><?php echo e($commentaire->Contenu); ?></p>

                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>



    </div>
        
    <!-- Inclure jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var commentInput = document.getElementById('comment-input');
            var publishButton = document.getElementById('publish-button');
    
            commentInput.addEventListener('input', function() {
                // Show the publish button when the user starts typing
                if (commentInput.value.trim() !== '') {
                    publishButton.style.display = 'inline-block';
                } else {
                    publishButton.style.display = 'none';
                }
            });
        });

        $(document).ready(function() {
            $('#comment-button').click(function() {
                $('#comment-section').toggle(); // Toggle comment section visibility
                $('#existing-comments').toggle(); // Toggle existing comments visibility
            });
    
            $('#comment-input').on('input', function() {
                // Show the publish button when the user starts typing
                if ($(this).val().trim() !== '') {
                    $('#publish-button').show();
                } else {
                    $('#publish-button').hide();
                }
            });
        });
    </script>
    
    


</body><?php /**PATH C:\Users\Lenovo\OneDrive\Bureau\pfa_v2-pfav2\resources\views/notes/display-one-note.blade.php ENDPATH**/ ?>