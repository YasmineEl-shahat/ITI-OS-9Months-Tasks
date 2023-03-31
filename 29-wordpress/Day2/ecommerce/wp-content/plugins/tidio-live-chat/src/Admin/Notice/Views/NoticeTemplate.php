<?php
if (!defined('WPINC')) {
    die('File loaded directly. Exiting.');
}

use TidioLiveChat\Translation\I18n;
?>

<div>
    <style>
        .tidio-notice-wrapper.notice {
            display: flex;
            position: relative;
        }
        .tidio-notice-wrapper.notice p {
            
            font-weight: 400;
            font-size: 12px;
            line-height: 16px;
            letter-spacing: -0.01em;
            margin: 12px 0;
        }
        .tidio-notice-wrapper.notice p.header {
            font-size: 14px;
            line-height: 18px;
        }
        .tidio-notice-wrapper.notice p strong {
            font-weight: 600;
        }
        .tidio-notice-wrapper .link.button {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 36px;
            background: #0566ff;
            border-radius: 4px;
            font-size: 14px;
            line-height: 18px;
            color: #ffffff;
            margin-right: 24px;
            margin-left: auto;
        }
        .tidio-notice-wrapper section {
            margin-right: 48px;
        } 
        .tidio-notice-wrapper section:last-child {
            margin-right: 24px;
        }
        .tidio-notice-wrapper .link.button:hover {
            color: #fff;
            background-color: #0049bd;
        }
        .tidio-notice-wrapper .notice-content {
            display: flex;
            flex-direction: row;
            align-items: center;
            min-width: 100%;
        }
        .tidio-notice-wrapper .logo {
            width: 32px;
            height: 32px;
            margin-left: 24px;
            margin-right: 24px;
        }
        .tidio-notice-wrapper .dissmiss-button {
            position: absolute;
            top: 4px;
            right: 4px;
            font-size: 13px;
            cursor: pointer;
        }
        @media screen and (max-width: 782px) {
            .tidio-notice-wrapper .notice-content {
                display: block;
            }
            .tidio-notice-wrapper .link.button {
                display: inline-flex;
                margin-right: 0;
                margin-left: 0;
                align-self: flex-start;
            }
            .tidio-notice-wrapper .logo {
                display: none;
            }
            .tidio-notice-wrapper section:last-child {
                margin-right: 0;
            }
        }
    </style>
    <div class="tidio-notice-wrapper notice notice-info">
        <div class="notice-content">
            <div class="logo">
                <svg
                    width="32"
                    height="32"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 32 32"
                    style="min-width: 32px; min-height: 32px"
                >
                    <g fill="none">
                        <path
                            d="M20.63 0a11.343 11.343 0 00-11.2 9.42 12.517 12.517 0 00.003 0A11.394 11.394 0 000 20.643V32h11.384a11.37 11.37 0 0011.18-9.25h-2.5H32V11.358C31.985 5.085 26.901.007 20.63 0zM9.263 11.394a11.271 11.271 0 000 .003v-.003z"
                            fill="#135EEB"
                        ></path>
                        <path
                            d="M11.408 9.25a12.53 12.53 0 00-1.975.17c-.108.651-.165 1.31-.17 1.97a11.363 11.363 0 0011.37 11.36h1.94c.14-.706.208-1.424.205-2.144a11.34 11.34 0 00-11.37-11.357z"
                            fill="#0A60EA"
                        ></path>
                        <path
                            d="M20.654 22.75A11.37 11.37 0 019.263 11.398c.004-.66.061-1.32.17-1.97A11.39 11.39 0 000 20.642V32h11.384a11.37 11.37 0 0011.18-9.25h-1.91z"
                            fill="#15C2FF"
                        ></path>
                        <path
                            d="M20.63 0a11.343 11.343 0 00-11.2 9.42 12.524 12.524 0 011.974-.17 11.357 11.357 0 0111.166 13.5H32V11.358C31.985 5.085 26.901.007 20.63 0z"
                            fill="#2C82FF"
                        ></path>
                    </g>
                </svg>
            </div>
            <section>
                <p class="header">
                    <strong>
                        <?php I18n::_e('Sed ac scelerisque massa.'); ?>
                    </strong>
                </p>
                <p>
                    <?php I18n::_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec pulvinar urna sit amet sapien sagittis lacinia. Etiam mollis ante sed ipsum pretium, et bibendum urna iaculis. '); ?>
                    <strong><?php I18n::_e('Praesent tincidunt lorem non mauris tincidunt pharetra.'); ?></strong>
                </p>
            </section>
            <a class="link button"> <?php I18n::_e('Click me'); ?></a>
        </div>
        <a data-tidio-dismissible-url="{dismiss_url}" class="dissmiss-button"
            ><svg
                xmlns="http://www.w3.org/2000/svg"
                width="22"
                height="22"
                viewBox="0 0 24 24"
                style="min-width: 22px; min-height: 22px"
            >
                <path
                    d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"
                ></path>
                <path d="M0 0h24v24H0z" fill="none"></path>
            </svg>
        </a>
    </div>
</div>
