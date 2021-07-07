<?php get_header(); ?>

<div class="bg-light about border-bottom pb25">
    <div class="container">
        <a id="about" class="anchor"></a>
        <h1 class="display-4 mb25"><span class="hash">#</span> About</h1>
        <div class="row">
            <div class="col-md-9">
                <p class="lead">
                    Hi, my name is Rob Keplin.  And this is my personal website and blog.
                </p>
                <p class="lead">
                    I'm a Senior Software Engineer based in New Ipswich, New Hampshire. Feel free to check out my <a title="LinkedIn" href="//linkedin.com/in/robkeplin">LinkedIn</a> or <a title="GitHub" href="//github.com/rkeplin">GitHub</a>.
                </p>
                <p class="lead">
                    I love building things, and seeing projects go from ideas to finished products.
                </p>
                <p class="lead">
                    Besides working full time and spending time with my beautiful wife and three magnificent children, - I'm available for freelance work.
                </p>
                <p class="lead">
                    Please <a title="contact me" href="#contact">contact me</a> if you'd like something done.
                </p>
            </div>
            <div class="col-md-3">
                <img alt="profile picture" class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/img/profile.jpg">
                <div class="caption text-center">
                    <small class="text-muted">Exploring the great outdoors</small>
                </div>
            </div>
        </div>
    </div>
</div>
<!--
<div class="bg-gray interests pb25">
    <div class="container">
        <div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto">
            <a id="interests" class="anchor"></a>
            <h1 class="display-4 mb25"><span class="hash">#</span> Interests</h1>
            <div class="card-deck text-center mb-3">

                <div class="card shadow-sm">
                    <img alt="AngularJS" class="card-img-top" src="<?php echo get_template_directory_uri(); ?>/assets/img/interests/angularjs.svg">
                    <div class="card-body"></div>
                    <div class="card-footer">
                        <small class="text-muted">AngularJS</small>
                    </div>
                </div>

                <div class="card shadow-sm">
                    <img alt="PHP" class="card-img-top" src="<?php echo get_template_directory_uri(); ?>/assets/img/interests/php-logo.svg">
                    <div class="card-body"></div>
                    <div class="card-footer">
                        <small class="text-muted">PHP</small>
                    </div>
                </div>

                <div class="card shadow-sm">
                    <img alt="MySQL" class="card-img-top" src="<?php echo get_template_directory_uri(); ?>/assets/img/interests/mysql.svg">
                    <div class="card-body"></div>
                    <div class="card-footer">
                        <small class="text-muted">MySQL</small>
                    </div>
                </div>

                <div class="card shadow-sm">
                    <img alt="WordPress" class="card-img-top" src="<?php echo get_template_directory_uri(); ?>/assets/img/interests/wordpress.svg">
                    <div class="card-body"></div>
                    <div class="card-footer">
                        <small class="text-muted">Wordpress</small>
                    </div>
                </div>
            </div>
            <div class="card-deck text-center">
                <div class="card shadow-sm">
                    <img alt="ElasticSearch" class="card-img-top" src="<?php echo get_template_directory_uri(); ?>/assets/img/interests/docker.svg">
                    <div class="card-body"></div>
                    <div class="card-footer">
                        <small class="text-muted">Docker</small>
                    </div>
                </div>

                <div class="card shadow-sm">
                    <img alt="Jenkins" class="card-img-top" src="<?php echo get_template_directory_uri(); ?>/assets/img/interests/jenkins.svg">
                    <div class="card-body"></div>
                    <div class="card-footer">
                        <small class="text-muted">Jenkins</small>
                    </div>
                </div>

                <div class="card shadow-sm">
                    <img alt="Vagrant" class="card-img-top" src="<?php echo get_template_directory_uri(); ?>/assets/img/interests/vagrant.svg">
                    <div class="card-body"></div>
                    <div class="card-footer">
                        <small class="text-muted">Vagrant</small>
                    </div>
                </div>

                <div class="card shadow-sm">
                    <img alt="PHPStorm" class="card-img-top" src="<?php echo get_template_directory_uri(); ?>/assets/img/interests/phpstorm.svg">
                    <div class="card-body"></div>
                    <div class="card-footer">
                        <small class="text-muted">PHPStorm</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
-->
<div class="bg-light contact pb25">
    <div class="container">
        <div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto">
            <a id="contact" class="anchor"></a>
            <h1 class="display-4 mb25"><span class="hash">#</span> Contact</h1>
            <div class="row">
                <div class="col-md-12">
                    <form action="//formspree.io/<?php echo getenv('CONTACT_EMAIL'); ?>" method="POST" name="sentMessage" id="contactForm">
                        <div class="form-group">
                            <label for="nameTxt">Name</label>
                            <input type="text" class="form-control" id="nameTxt" name="name" placeholder="Enter Name" required data-validation-required-message="Please enter your name.">
                        </div>
                        <div class="form-group">
                            <label for="emailTxt">Email address</label>
                            <input type="email" class="form-control" id="emailTxt" name="email" placeholder="Enter email" required data-validation-required-message="Please enter your email address.">
                        </div>
                        <div class="form-group">
                            <label for="msgTxt">Message</label>
                            <textarea placeholder="Enter Message" rows="5" name="message" class="form-control" id="msgTxt" required data-validation-required-message="Please enter a message."></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
