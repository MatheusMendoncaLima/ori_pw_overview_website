<?php

namespace App\Http\Controllers;

use App\Services\InstitutionalContentService;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct(private readonly InstitutionalContentService $contentService)
    {
    }

    public function __invoke(): View
    {
        return view('home', [
            'content' => $this->contentService->active()->groupBy('section'),
            'sections' => config('ori.sections'),
            'references' => $this->references(),
        ]);
    }

    private function references(): array
    {
        return [
            ['BORGES, Wanessa Ferreira; MENDES, Enicéia Gonçalves. Recursos de acessibilidade e o uso dos dispositivos móveis como tecnologia assistiva por pessoas com baixa visão. Revista Brasileira de Educação Especial, v. 27, e0036, p. 813–828, 2021.', 'https://doi.org/10.1590/1980-54702021v27e0036'],
            ['COSTA, Matheus Santos; COSTA, Vasti Ferreira Gonçalves; VIEIRA JUNIOR, Niltom. Uso do aplicativo SpeeCH como tecnologia assistiva para uma criança com transtorno do espectro autista (TEA): um estudo de caso. Revista Educação Especial, v. 36, n. 1, e8, p. 1–19, 2023.', 'https://doi.org/10.5902/1984686X70474'],
            ['FONSECA, Juliana Tavares dos Reis; SCHIRMER, Carolina Rizzotto. Tecnologia Assistiva: aplicativos para dispositivos móveis, uma contribuição tecnológica para aprendizagem de crianças autistas. Revista Educação e Cultura Contemporânea, v. 17, n. 51, p. 155–175, 2020.', 'https://doi.org/10.5935/2238-1279.20200105'],
            ['MOREIRA, Mariana dos Santos; LIMA, Matheus Mendonça de; COSTA, Nicollas Lopes. ORI: documento de definição do produto e escopo do MVP. São Paulo: ETEC Zona Leste, 22 jul. 2026a. Documento de projeto.', null],
            ['MOREIRA, Mariana dos Santos; LIMA, Matheus Mendonça de; COSTA, Nicollas Lopes. ORI: levantamento bibliográfico. São Paulo: ETEC Zona Leste, 2026b. Documento de projeto.', null],
            ['MOREIRA, Mariana dos Santos; LIMA, Matheus Mendonça de; COSTA, Nicollas Lopes. ORI: pré-projeto do Trabalho de Conclusão de Curso. São Paulo: ETEC Zona Leste, 2026c. Documento de projeto.', null],
            ['MOREIRA, Mariana dos Santos; LIMA, Matheus Mendonça de; COSTA, Nicollas Lopes. ORI: repositório de código-fonte. GitHub, 2026d.', 'https://github.com/MatheusMendoncaLima/ori'],
            ['PORTE, Marcelo de Santana; ROCHA, José Damião Trindade. Barreiras tecnológicas: um fator limitador na acessibilidade das pessoas com deficiência. Texto Livre, v. 14, n. 3, e32563, 2021.', 'https://doi.org/10.35699/1983-3652.2021.32563'],
            ['REIS, Marlene Barbosa de Freitas; SOUZA, Carla Salomé Margarida de; SANTOS, Lilian Cristina dos. Tecnologia assistiva em dispositivos móveis: aplicativos baseados no TEACCH como auxílio no processo de alfabetização com crianças autistas. EccoS – Revista Científica, n. 55, e10652, p. 1–17, 2020.', 'https://doi.org/10.5585/eccos.n55.10652'],
            ['SILVA, Fabiola; SERRA, Antônio Roberto Coelho. Tecnologia assistiva: recursos de comunicação aumentativa e alternativa na proposta de interação e aprendizagem dos alunos com autismo. Revista Tempos e Espaços em Educação, v. 16, n. 35, e18610, p. 1–13, 2023.', 'https://doi.org/10.20952/revtee.v16i35.18610'],
            ['SILVEIRA, Lisiane Corrêa Gomes; LUIZ, Jaison Marques; GUTERRES, Lisandra Xavier; MENDES, Luís Fernando da Silva; RIBEIRO, Luis Otoni Meireles. Tecnologias assistivas no contexto da acessibilidade e mobilidade: possibilidades de inclusão digital de autistas na educação a distância. EmRede – Revista de Educação a Distância, v. 7, n. 2, p. 61–73, 2020.', 'https://doi.org/10.53628/emrede.v7i2.539'],
            ['WORLD WIDE WEB CONSORTIUM. Making Content Usable for People with Cognitive and Learning Disabilities. W3C Working Group Note, 29 abr. 2021.', 'https://www.w3.org/TR/coga-usable/'],
        ];
    }
}
