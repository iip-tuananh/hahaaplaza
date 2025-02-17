$(".particle-1").each((function() {
    particlesJS($(this).attr("id"), {
        particles: {
            number: {
                value: 160,
                density: {
                    enable: !0,
                    value_area: 800
                }
            },
            color: {
                value: "#684DF4"
            },
            shape: {
                type: "circle",
                stroke: {
                    width: 0,
                    color: "#000000"
                },
                polygon: {
                    nb_sides: 5
                },
                image: {
                    src: "img/github.svg",
                    width: 100,
                    height: 100
                }
            },
            opacity: {
                value: .4,
                random: !1,
                anim: {
                    enable: !1,
                    speed: 1,
                    opacity_min: .1,
                    sync: !1
                }
            },
            size: {
                value: 8,
                random: !0,
                anim: {
                    enable: !1,
                    speed: 40,
                    size_min: .1,
                    sync: !1
                }
            },
            line_linked: {
                enable: !0,
                distance: 150,
                color: "#684DF4",
                opacity: .4,
                width: 1
            },
            move: {
                enable: !0,
                speed: 1.5,
                direction: "none",
                random: !1,
                straight: !1,
                out_mode: "out",
                attract: {
                    enable: !1,
                    rotateX: 600,
                    rotateY: 1200
                }
            }
        },
        interactivity: {
            detect_on: "canvas",
            events: {
                onhover: {
                    enable: !1,
                    mode: "repulse"
                },
                onclick: {
                    enable: !0,
                    mode: "push"
                },
                resize: !0
            },
            modes: {
                grab: {
                    distance: 400,
                    line_linked: {
                        opacity: 1
                    }
                },
                bubble: {
                    distance: 400,
                    size: 40,
                    duration: 2,
                    opacity: 8,
                    speed: 3
                },
                repulse: {
                    distance: 200
                },
                push: {
                    particles_nb: 4
                },
                remove: {
                    particles_nb: 2
                }
            }
        },
        retina_detect: !0,
        config_demo: {
            hide_card: !1,
            background_color: "#b61924",
            background_image: "",
            background_position: "50% 50%",
            background_repeat: "no-repeat",
            background_size: "cover"
        }
    })
})), $(".body-particle").each((function() {
    particlesJS($(this).attr("id"), {
        particles: {
            number: {
                value: 5,
                density: {
                    enable: !0,
                    value_area: 1e3
                }
            },
            shape: {
            },
            opacity: {
                value: .5,
                random: !1,
                anim: {
                    enable: !0,
                    speed: 2,
                    opacity_min: .1,
                    sync: !1
                }
            },
            size: {
                value: 8,
                random: !1,
                anim: {
                    enable: !1,
                    speed: 5,
                    size_min: 8,
                    sync: !0
                }
            },
            line_linked: {
                enable: !1
            },
            move: {
                enable: !0,
                speed: 15,
                direction: "none",
                random: !1,
                straight: !1,
                out_mode: "bounce",
                bounce: !0,
                attract: {
                    enable: !1,
                    rotateX: 1200,
                    rotateY: 1e4
                }
            }
        },
        interactivity: {
            detect_on: "canvas",
            events: {
                onhover: {
                    enable: !0,
                    mode: "bubble"
                },
                onclick: {
                    enable: !0,
                    mode: "push"
                },
                resize: !0
            },
            modes: {
                bubble: {
                    distance: 300,
                    size: 8.2,
                    duration: .1,
                    opacity: 8,
                    speed: 80
                },
                repulse: {
                    distance: 100,
                    duration: 1
                },
                push: {
                    particles_nb: 2
                },
                remove: {
                    particles_nb: 4
                }
            }
        }
    })
})), $(".hero-particle").each((function() {
    particlesJS($(this).attr("id"), {
        particles: {
            number: {
                value: 5,
                density: {
                    enable: !0,
                    value_area: 1e3
                }
            },
            shape: { },
            opacity: {
                value: .5,
                random: !1,
                anim: {
                    enable: !0,
                    speed: 2,
                    opacity_min: .1,
                    sync: !1
                }
            },
            size: {
                value: 8,
                random: !1,
                anim: {
                    enable: !1,
                    speed: 5,
                    size_min: 8,
                    sync: !0
                }
            },
            line_linked: {
                enable: !1
            },
            move: {
                enable: !0,
                speed: 15,
                direction: "none",
                random: !1,
                straight: !1,
                out_mode: "bounce",
                bounce: !0,
                attract: {
                    enable: !1,
                    rotateX: 1200,
                    rotateY: 1e4
                }
            }
        },
        interactivity: {
            detect_on: "canvas",
            events: {
                onhover: {
                    enable: !0,
                    mode: "bubble"
                },
                onclick: {
                    enable: !0,
                    mode: "push"
                },
                resize: !0
            },
            modes: {
                bubble: {
                    distance: 300,
                    size: 8.2,
                    duration: .1,
                    opacity: 8,
                    speed: 80
                },
                repulse: {
                    distance: 100,
                    duration: 1
                },
                push: {
                    particles_nb: 2
                },
                remove: {
                    particles_nb: 4
                }
            }
        }
    })
}));