<?php

class About extends Controller{

    public function index($name='default name', $job='default job')
    {
        $data['name']=$this->model('User_model')->getUser();
        $data['job']=$job;

        $this->view('templates/header');
        $this->view('about/index',$data);
        $this->view('templates/footer');
    }
    
    public function page()
    {
        $this->view('templates/header');
        $this->view('about/page');
        $this->view('templates/footer');
    }
}

// global _start
// section .data
// cekit db "enter two word"
// lencek equ $ - cekit
// buff1 db "kecoak hitam",10
// len_b1 equ $ - buff1
// buff2 db "sedang berpesta.",10
// len_b2 equ $ - buff2
// size_all equ $ - buff1
// letsgo db "Press q to exit",10
// size_let equ $ - letsgo
// press_q db 0
// section .text
// _start:
// ulang:
// mov eax,4
// mov ebx,1
// mov ecx,cekit
// mov edx,lencek
// int 80h
// //--- bagian ini berfungsi sebagai clear buffer
// xor eax,eax
// mov ecx,size_all
// mov edi,buff1
// rep stosb
// //----------------------------------------------
// mov al,3
// xor ebx,ebx
// mov ecx,buff1
// mov edx,len_b1
// int 80h
// mov al,3
// xor ebx,ebx
// mov ecx,buff2
// mov edx,len_b2
// int 80h
// mov eax,4
// mov ebx,1
// mov ecx,buff1
// mov edx,size_all
// int 80h
// mov eax,4
// mov ebx,1
// mov ecx,letsgo
// mov edx,size_let
// int 80h
// mov eax,3
// xor ebx,ebx
// mov ecx,press_q
// mov edx,1
// int 80h
// cmp byte [press_q],'q'
// jnz ulang
// exit:
// xor ebx,ebx
// mov eax,1
// int 80h