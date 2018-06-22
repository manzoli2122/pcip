<?php

namespace App\Helpers;

use Monolog\Logger;

use App\Helpers\ChannelStreamHandler;

class ChannelWriter
{
    /**
     * The Log channels.
     *
     * @var array
     */
    protected $channels = [
        'event' => [ 
            'path' => 'logs/audit.log', 
            'level' => Logger::INFO 
        ],
        'audit' => [ 
            'path' => 'logs/audit.log', 
            'level' => Logger::INFO 
        ],
        'cadastro' => [ 
            'path' => 'logs/cadastro.log', 
            'level' => Logger::INFO 
        ],
        'atendimento' => [ 
            'path' => 'logs/atendimento.log', 
            'level' => Logger::INFO 
        ],
        'despesas' => [ 
            'path' => 'logs/despesas.log', 
            'level' => Logger::INFO 
        ],
        'servico' => [ 
            'path' => 'logs/servico.log', 
            'level' => Logger::INFO 
        ],
        'produto' => [ 
            'path' => 'logs/produto.log', 
            'level' => Logger::INFO 
        ],
        'login' => [ 
            'path' => 'logs/login.log', 
            'level' => Logger::INFO 
        ],
        'cliente' => [ 
            'path' => 'logs/cliente.log', 
            'level' => Logger::INFO 
        ],
        'funcionario' => [ 
            'path' => 'logs/funcionario.log', 
            'level' => Logger::INFO 
        ],
        'operadora' => [ 
            'path' => 'logs/operadora.log', 
            'level' => Logger::INFO 
        ],
        'acl' => [ 
            'path' => 'logs/acl.log', 
            'level' => Logger::INFO 
        ],
        'pagamentos' => [ 
            'path' => 'logs/pagamentos.log', 
            'level' => Logger::INFO 
        ]
    ];

    /**
     * The Log levels.
     *
     * @var array
     */
    protected $levels = [
        'debug'     => Logger::DEBUG,
        'info'      => Logger::INFO,
        'notice'    => Logger::NOTICE,
        'warning'   => Logger::WARNING,
        'error'     => Logger::ERROR,
        'critical'  => Logger::CRITICAL,
        'alert'     => Logger::ALERT,
        'emergency' => Logger::EMERGENCY,
    ];

    public function __construct() {}

    /**
     * Write to log based on the given channel and log level set
     * 
     * @param type $channel
     * @param type $message
     * @param array $context
     * @throws InvalidArgumentException
     */
    public function writeLog($channel, $level, $message, array $context = [])
    {
        //check channel exist
        if( !in_array($channel, array_keys($this->channels)) ){
            throw new InvalidArgumentException('Invalid channel used.');
        }

        //lazy load logger
        if( !isset($this->channels[$channel]['_instance']) ){
            //create instance
            $this->channels[$channel]['_instance'] = new Logger($channel);
            //add custom handler
            $this->channels[$channel]['_instance']->pushHandler( 
                new ChannelStreamHandler( 
                    $channel, 
                    storage_path() .'/'. $this->channels[$channel]['path'], 
                    $this->channels[$channel]['level']
                )
            );
        }

        //write out record
        $this->channels[$channel]['_instance']->{$level}($message, $context);
    }

    
    
    
    
    public function write($channel, $message, array $context = []){
        //get method name for the associated level
        $level = array_flip( $this->levels )[$this->channels[$channel]['level']];
        //write to log
        $this->writeLog($channel, $level, $message, $context);
    }

    
    
    
    
    
    
    
    
    public function info( $channel , $message, array $context = []){       
        $this->writeLog($channel, 'info' , $message, $context);
    }

    
    
    
    
    
    
    
    public function error( $channel , $message, array $context = []){       
        $this->writeLog($channel, 'error' , $message, $context);
    }
    
    
    
    
    
    public function notice( $channel , $message, array $context = []){       
        $this->writeLog($channel, 'notice' , $message, $context);
    }
    
    
    
    
    
    
    public function warning( $channel , $message, array $context = []){       
        $this->writeLog($channel, 'warning' , $message, $context);
    }
    
    
    
        
    
    
    public function critical( $channel , $message, array $context = []){       
        $this->writeLog($channel, 'critical' , $message, $context);
    }
    
    
    
    
    
       
    public function alert( $channel , $message, array $context = []){       
        $this->writeLog($channel, 'alert' , $message, $context);
    }
    
    
    
    
    
    
    public function emergency( $channel , $message, array $context = []){       
        $this->writeLog($channel, 'emergency' , $message, $context);
    }
    
    
    
    
    
    
    //alert('event','Message');
    function __call($func, $params){
        if(in_array($func, array_keys($this->levels))){
            return $this->writeLog($params[0], $func, $params[1]);
        }
    }
    
    

}