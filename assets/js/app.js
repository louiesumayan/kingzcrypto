$(document).ready(function () {

    const urlParams = new URLSearchParams(window.location.search);

    let sortBy = urlParams.get('sortBy');
    let sortTable = urlParams.get('sortTable');

    if (sortTable !== null) {
        $(`table[attr-table="${sortTable}"] tr:not(.promoted) .sortable[attr-name="${sortBy}"]`).addClass('is-active');

        if (urlParams.get('sortDir') === 'asc') {
            $(`table[attr-table="${sortTable}"] .sortable[attr-name="${sortBy}"]`).addClass('asc');
        } else {
            $(`table[attr-table="${sortTable}"] .sortable[attr-name="${sortBy}"]`).removeClass('asc');
        }
    }

    $('.modal-background, .close-modal, .modal-card-head button').click(function () {
        $('.modal').removeClass('is-active')
    })

    $('#search-bar-desktop, .nav-mobile .nav-search, .mobile-search .close-btn').click(function(e) {
        e.preventDefault();

        $(this).toggleClass('is-open');
        $('.mobile-search').toggleClass('is-open');
        $('#search-bar-mobile').focus()
        console.log('focussing')
        $('html').toggleClass('is-clipped')
    })

    function fallbackCopyTextToClipboard(text) {
        var textArea = document.createElement("textarea");
        textArea.value = text;

        // Avoid scrolling to bottom
        textArea.style.top = "0";
        textArea.style.left = "0";
        textArea.style.position = "fixed";

        document.body.appendChild(textArea);
        textArea.focus();
        textArea.select();

        try {
            var successful = document.execCommand('copy');
            var msg = successful ? 'successful' : 'unsuccessful';
            console.log('Fallback: Copying text command was ' + msg);
        } catch (err) {
            console.error('Fallback: Oops, unable to copy', err);
        }

        document.body.removeChild(textArea);
    }

    function copyTextToClipboard(text) {
        if (!navigator.clipboard) {
            fallbackCopyTextToClipboard(text);
            return;
        }
        navigator.clipboard.writeText(text).then(function () {
            console.log('Async: Copying to clipboard was successful!');
        }, function (err) {
            console.error('Async: Could not copy text: ', err);
        });
    }

    $('a.kyc-plus-link').click(function (e) {
        e.preventDefault();
        window.open('https://assuredefi.com/fraud-pursuit/', '_blank');
    })

    $('.can-copy').click(function () {
        copyTextToClipboard($(this).data('copy'))
        $('.copied').removeClass('is-hidden')
        setTimeout(function () {
            $('.copied').addClass('is-hidden')
        }, 1000)
    })

    $('.listings tbody tr:not(.ignore) td:not(.ignore)').click(function () {
        window.location.href = $(this).parent().find('a.button').attr('href')
    })
    /*

    $('.nav-burger').click(function () {
        $('.mobile-menu').toggleClass('is-open')

        if ($('.mobile-menu').is(':visible')) {
            $('.overlay').removeClass('is-hidden')
        } else {
            $('.overlay').addClass('is-hidden')
        }
    })
    */

    $('.mobile-menu .close').click(function () {
        $('.mobile-menu').removeClass('is-open')
        $('.overlay').addClass('is-hidden')
    })

    let polling = false;
    let timeout = false;
    /*
    $('.has-search input').keyup(function () {

        let resultsElem = $(this).parent().parent().find('.results:not(.search-ad)')
        let inputElem = this
        let ignore = $(this).parents('nav.navbar').length > 0
        if (timeout !== false) {
            clearTimeout(timeout)
            timeout = false
        }
        timeout = setTimeout(function () {
            console.log('Done polling')
            if(!ignore)
                doSearch(inputElem, resultsElem)
        }, 500)
    })

    function doSearch(inputElem, resultsElem) {
        let q = $(inputElem).val()
        if (q.length === 0) {
            $(resultsElem).addClass('is-hidden')
            return false;
        }

        $(resultsElem).html('')

        $.get('/search?q=' + q, function (response) {
            if (response.length > 0) {
                response.forEach(function (listing) {
                    let elem = `<a href="/coin/${listing.id}" class="result">\n` +
                        `    <img src="${listing.logo_link}" loading="lazy" alt="">\n` +
                        `    <div class="has-titles">` +
                        `        <span class="titles">\n` +
                        `            <h1>${listing.name}</h1>\n` +
                        `            <h2>\$${listing.symbol}</h2>\n` +
                        `        </span>\n` +
                        `        <span class="titles">\n` +
                        `            <h3>${listing.bsc_contract_address}</h3>\n` +
                        `            <h4><svg width="8" height="4" viewBox="0 0 8 4" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.32937 0.1152C4.29267 0.079672 4.24356 0.0506224 4.18628 0.030554C4.129 0.0104855 4.06526 -1.05568e-07 4.00054 -1.11225e-07C3.93583 -1.16883e-07 3.87209 0.0104855 3.8148 0.0305539C3.75752 0.0506223 3.70842 0.079672 3.67172 0.1152L0.0714341 3.58163C0.0297609 3.62161 0.00532296 3.66844 0.000774885 3.71703C-0.00377272 3.76562 0.0117431 3.81411 0.0456381 3.85724C0.0795326 3.90036 0.130509 3.93647 0.193029 3.96164C0.25555 3.98681 0.327222 4.00008 0.40026 4L7.60082 4C7.67369 3.9998 7.7451 3.98636 7.80737 3.96113C7.86964 3.9359 7.92041 3.89984 7.95422 3.85681C7.98804 3.81379 8.00362 3.76543 7.99929 3.71694C7.99496 3.66846 7.97088 3.62168 7.92965 3.58163L4.32937 0.1152Z" fill="#FFFFFF"></path></svg>${listing.votes}</h4>\n` +
                        `        </span>\n` +
                        `    </div>` +
                        `</a>`
                    $(resultsElem).append($(elem))
                })
            } else {
                let elem = '<div class="noresults result">No results...</div>';
                $(resultsElem).append($(elem))
            }
            $(resultsElem).removeClass('is-hidden')
        })
    }
    */

    $('body').click(function (e) {
        if ($(e.target).parents('.has-search').length == 0) {
            $('.has-search .results').addClass('is-hidden')
        } else {
            if (!$('.has-search .results').is(':visible') && $('.has-search:visible input').val().length > 0) {
                $('.has-search:visible .results').removeClass('is-hidden')
            }
            console.log('show again')
        }
    })

    $('.overlay').click(function () {
        $('.mobile-menu').removeClass('is-open')
        $('.overlay').addClass('is-hidden')
    })
    /*
    $('form.logout a').click(function (e) {
        e.preventDefault()
        $('form.logout').submit()
    })
    */

    $('.accordion h2').click(function () {
        $(this).parent().toggleClass('is-open')
    })
/*
    $('.has-wishlist').on('click', function (e) {
        e.preventDefault()
        e.stopPropagation()

        if($('.usercheck').data('loggedin') == 0) {
            window.location.href = '/login?redir=/watchlist'
        }

        let elem = $(this);
        let listing_id = $(this).parents('tr').data('listingid')

        if($(this).find('.wishlist-add').length > 0) {
            console.log('Add', listing_id)

            $.post('/watchlist/add/' + listing_id, {
                '_token': $('div.grwwe').data('xx')
            }, function (response) {
                if(response.success == true) {
                    $(elem).html('<div class="wishlist-remove"><img class="star" src="/assets/img/star-filled.png"></div>')
                }
            })
        } else {
            console.log('Remove', listing_id)

            $.post('/watchlist/remove/' + listing_id, {
                '_token': $('div.grwwe').data('xx')
            }, function (response) {
                if(response.success == true) {
                    if($('section.watchlist').length > 0) {
                        $(elem).parents('tr').remove()
                        $('section.watchlist tbody tr').each(function(i,e) {
                            $(e).find('td:first-of-type span').html(parseInt(i + 1))
                        })
                    } else {
                        $(elem).html('<div class="wishlist-add"><img class="star" src="/assets/img/star.png"></div>')
                    }
                }
            })
        }
    })


    if($('section.ama').length > 0) {
        let startDate = $('section.ama').data('startdate') * 1000
        let endDate = $('section.ama').data('enddate') * 1000

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = startDate - now;
            var distanceEnd = endDate - now;

            console.log(distance, distanceEnd)

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            hours = hours < 10 ? '0' + hours : hours
            minutes = minutes < 10 ? '0' + minutes : minutes
            seconds = seconds < 10 ? '0' + seconds : seconds

            $('section.ama .countdown .days p:first-of-type').html(days)
            $('section.ama .countdown .hours p:first-of-type').html(hours)
            $('section.ama .countdown .minutes p:first-of-type').html(minutes)
            $('section.ama .countdown .seconds p:first-of-type').html(seconds)

            // If the count down is finished, write some text
            if (distanceEnd < 0) {
                clearInterval(x);
                $('section.ama').addClass('is-hidden')
            }
            if(distanceEnd > 0 && distance < 0) {
                $('section.ama .countdown').addClass('is-hidden')
                $('section.ama .live').removeClass('is-hidden')
            }
        }, 1000);
    }

    // let adCheckInterval = setInterval(function(){
    //     if($('.banner.pro svg').length > 0) {
    //         $('.banner.pro .loading').removeClass('loading')
    //         clearInterval(adCheckInterval)
    //         console.log('Found, loaded')
    //     }
    // }, 100)
    //
    // setTimeout(function(){
    //     clearInterval(adCheckInterval)
    // }, 2500)

    if($('.pending-security-scan').length > 0) {
        let scanInterval = setInterval(function(){
            let id = $('.pending-security-scan').data('id')
            $.get('/api/coin/' + id + '/security-scan', function(response) {
                if(response.error === false && response.has_security_scan === true)
                    showRefreshButton()
            })
        }, 5000);

        function showRefreshButton() {
            clearInterval(scanInterval)
            $('.pending-security-scan button').addClass('is-hidden')
            $('.pending-security-scan a.button').removeClass('is-hidden')
        }
    }

    // Airdrop modal
    $('.active-airdrop a.join-button').click(function(e){
        e.preventDefault()
        if(!$('body').hasClass('logged-in')) {
            window.location.href = '/login'
            return;
        }
        $('.airdrop-modal .airdrop-title').html($(this).data('airdroptitle'))
        $('.airdrop-modal span.network img').attr('src', '/assets/img/' + $(this).data('airdropnetwork') + '.png')
        $('.airdrop-modal span.network span').html($(this).data('airdropnetwork').toUpperCase())
        $('.airdrop-modal form input[name=airdrop_id]').val($(this).data('airdropid'))
        $('.airdrop-modal').addClass('is-active')
    })

    $('.airdrop-modal .tasks .task .has-task-link').click(function(){
        let taskElem = $(this).parents('.task')
        $(taskElem).addClass('has-visited')
        checkTaskButton(taskElem)
    })

    $('.airdrop-modal .tasks .task input').keyup(function(){
        checkTaskButton($(this).parents('.task'))
    })

    $('.airdrop-modal .tasks .task .complete-button').click(function(e){
        e.preventDefault()
        let taskElem = $(this).parents('.task')
        if($(taskElem).hasClass('is-ready')) {
            $(taskElem).addClass('is-finished')
            $(taskElem).find('input[name=airdrop_task_complete_' + $(taskElem).data('taskid') + ']').val(1)
        }
        checkTasksComplete()
    })

    function checkTaskButton(taskElem) {
        if($(taskElem).hasClass('has-visited')) {
            if($(taskElem).data('inputrequired') === 0) {
                return toggleTaskButton(taskElem, false, 'is-finished')
            } else {
                if($(taskElem).find('input[name=airdrop_task_input_' + $(taskElem).data('taskid') + ']').val().length > 2) {
                    return toggleTaskButton(taskElem, false, 'is-ready')
                }
            }
        }

        return toggleTaskButton(taskElem, true)
    }

    function toggleTaskButton(taskElem, disabled, addClass) {
        if(disabled) {
            $(taskElem).find('.complete-button').attr('disabled', true)
            $(taskElem).find('p.small.error').removeClass('is-hidden')
            $(taskElem).removeClass('is-finished')
        } else {
            $(taskElem).find('.complete-button').attr('disabled', false)
            $(taskElem).find('p.small.error').addClass('is-hidden')
            $(taskElem).addClass(addClass)
            if(addClass == 'is-finished') {
                $(taskElem).find('input[name=airdrop_task_complete_' + $(taskElem).data('taskid') + ']').val(1)
            }
        }

        checkTasksComplete()
    }

    function checkTasksComplete() {
        let passed = true
        $('.airdrop-modal .tasks .task').each(function(i, taskElem) {
            console.log(taskElem)
            if(!$(taskElem).hasClass('is-finished'))
                passed = false
        })

        if(passed) {
            $('.airdrop-modal .join-airdrop-button').attr('disabled', false)
        } else {
            $('.airdrop-modal .join-airdrop-button').attr('disabled', true)
        }
    }

    if($('.horizontal-scroll').length > 0) {

        let scrollProcessing = true
        let horizontalScrollWidth = $('.horizontal-scroll .presales-home:first-of-type').css('width')
        horizontalScrollWidth = parseInt(horizontalScrollWidth.replace('px', '')) + 16
        let scrollCurrentPage = 1
        $('.horizontal-scroll .scroll-nav .nav-item').click(function(){
            scrollProcessing = false
            $('.horizontal-scroll .scroll-nav .nav-item').removeClass('is-active')
            $(this).addClass('is-active')
            let page = $(this).data('navid')

            let scrollPos = (page - 1) * horizontalScrollWidth
            scrollCurrentPage = 2
            $('.horizontal-scroll .scroll-content').animate({scrollLeft: scrollPos}, {
                duration: 500,
                complete: function(){
                    scrollProcessing = true
                }
            })
        })

        $('.horizontal-scroll .scroll-content').on('scroll', function(){
            if(!scrollProcessing)
                return

            let scrollLeft = $('.horizontal-scroll .scroll-content').scrollLeft()
            if(scrollLeft === 0)
                return;

            let page = Math.ceil((scrollLeft / horizontalScrollWidth) + 0.5)
            if(page != scrollCurrentPage) {
                scrollCurrentPage = page
                $('.horizontal-scroll .scroll-nav .nav-item').removeClass('is-active')
                $('.horizontal-scroll .scroll-nav .nav-item:nth-child(' + page + ')').addClass('is-active')
            }
            console.log(scrollLeft, page)
        })
    }

    $('.airdrop-modal .close-modal').click(function(){
        $('.airdrop-modal').removeClass('is-active')
    })
*/
    // Boosts modal
    $('.promoted-boost-btn').click(function(e){
        e.preventDefault()

        $('.boost-modal .boost-faq, .boost-modal .step-2').addClass('is-hidden')
        $('.boost-modal .step-1').removeClass('is-hidden')


        let projectName = $(this).data('name')
        let imageUrl = $(this).data('imageurl')
        let id = $(this).data('id')

        if($('.usercheck').data('loggedin') == 0) {
            let redir = '/#boost-' + id
            window.location.href = '/login?redir=' + encodeURIComponent(redir)
            return
        }

        console.log(projectName, imageUrl, id)

        $('.boost-modal .project-title').html(projectName)
        $('.boost-modal .modal-card-head img').attr('src', imageUrl)
        $('.boost-modal [name=listing_id]').val(id)
        $('.boost-modal').addClass('is-active')
    })

    if($('.usercheck').data('loggedin') == 1) {
        if(window.location.hash.indexOf('boost-') >= 0) {
            let id = window.location.hash.split('boost-')[1]
            $('.promoted-boost-btn[data-id=' + id + ']').click()
            history.pushState("", document.title, window.location.pathname + window.location.search)
        }
    }

    // Boost slider input
    let boostBalance = $('#boostRangeSlider').data('boostbalance')
    $(document).on('input', '#boostRangeSlider', function(){
        let percentage = $(this).val() * 0.01
        let amount = Math.min(Math.ceil(boostBalance * percentage), boostBalance)
        $('#boostAmount').val(amount)
        changeBoostButton()
    })

    $('#boostAmount').keyup(function(){
        let amount = parseInt($(this).val())
        if(amount > boostBalance) {
            $('#boostAmount').val(boostBalance)
            amount = boostBalance
        }

        if(amount < 0 && $(this).val().length != 0)
            $('#boostAmount').val(0)

        if($(this).val() == '') {
            amount = 0
        }

        let percentage = 0
        if(amount > 0)
            percentage = Math.min(Math.ceil(amount / boostBalance * 100), 100)

        $('#boostRangeSlider').val(percentage)
        changeBoostButton()
    })

    function changeBoostButton() {
        let amount = $('#boostAmount').val()
        if(amount > 0 && amount <= 1000 && amount <= boostBalance)
            $('#submitBoostFormBtn').attr('disabled', false)
        else
            $('#submitBoostFormBtn').attr('disabled', true)
    }

    $('.boost-modal form').submit(function(e){
        e.preventDefault()

        $.post('/boosts/boost', $(this).serialize(), function(response){
            processBoostFormErrors(response)
            if(typeof(response.success) != 'undefined' && response.success == true) {
                $('.boost-modal .step-1, .boost-modal .step-2, .boost-modal .modal-card-title').toggleClass('is-hidden')
            }
        }).always(function(response){
            processBoostFormErrors(response.responseJSON)
        })
    })

    function processBoostFormErrors(response) {
        if(typeof(response.errors) != 'undefined') {
            $('.boost-modal .has-errors').html('')
            for (const i in response.errors) {
                let error = response.errors[i][0]
                $('.boost-modal .has-errors').append('<div class="message error">' + error + '</div>')
            }
            $('.boost-modal .has-errors').removeClass('is-hidden')
        }
    }

    $('.boost-modal .step-2 .button').click(function(){
        window.location.reload()
    })

    $('.boost-modal .boost-faq .back, .boost-modal .boost-faq-btn').click(function(){
        $('.boost-modal .boost-faq, .boost-modal .step-1').toggleClass('is-hidden')
    })
})

function setCookie(cname, cvalue, hours) {
    const d = new Date();
    d.setTime(d.getTime() + (hours*60*60*1000));
    let expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
