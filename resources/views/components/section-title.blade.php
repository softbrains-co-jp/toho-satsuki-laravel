<div
    @class([
        "tw:bg-[url('../assets/ttlbg.png')] tw:bg-no-repeat tw:bg-[center_left_-20px] tw:bg-[#323280] tw:h-[49px] tw:ps-[60px] tw:leading-[49px] tw:font-bold tw:text-[1.4rem] tw:text-white tw:rounded-[4px] mb-[23px] tw:flex tw:justify-between",
        $attributes->get('class'),
    ])
>
    <div>
        {{ $slot }}
    </div>
    <div class="tw:font-bold tw:text-[1.6rem] tw:px-3 tw:cursor-pointer">
        <i class="fa-solid fa-angle-up"></i>
    </div>
</div>
