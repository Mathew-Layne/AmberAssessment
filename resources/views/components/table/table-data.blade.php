@props(['responsiveName' => 'Responsive Name'])


<td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
    
    <span class="inline-block w-1/3 md:hidden font-bold">

        {{ $responsiveName }}

    </span>
    
    {{ $slot }}

</td>
